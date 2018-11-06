<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\db\Query;
use app\models\Email;

class BackprocessController extends Controller {

    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    //============ Match all the carers (RUN Everyday at 12:00 AM) ================//

    public function actionMatchmaking() {
        $sql = "SELECT user_master.id, user_master.first_name, user_master.last_name, user_master.email, user_master.image,
        user_master.latitude, user_master.longitude, available_time.day_master_id, available_time.start_time,
        available_time.end_time, family_details.care_needed, family_details.care_describe_type,
        family_details.other_task, family_details.carer_child_work FROM user_master
        LEFT JOIN available_time ON user_master.id = available_time.user_id
        LEFT JOIN family_details ON user_master.id = family_details.user_id
        WHERE user_master.status = '1' AND user_master.type_id = '3'
        AND family_details.is_looking_found = 0 AND available_time.status = 1 GROUP BY user_master.id";
        $data = Yii::$app->getDb()->createCommand($sql)->queryAll();
        if (count($data) > 0) {
            foreach ($data AS $key => $val) {
                $partial_sql = "";
                if (isset($val['care_needed']) && $val['care_needed'] != "") {
                    $care_needed = explode(",", $val['care_needed']);
                    foreach ($care_needed as $k => $v) {
                        $partial_sql .= " AND (FIND_IN_SET ($v, carer_details.care_type) > 0)";
                    }
                }
                if (isset($val['care_describe_type']) && $val['care_describe_type'] != "") {
                    $care_describe_type = explode(",", $val['care_describe_type']);
                    foreach ($care_describe_type as $k => $v) {
                        $partial_sql .= " AND (FIND_IN_SET ($v, carer_details.job_type) > 0)";
                    }
                }
                if (isset($val['other_task']) && $val['other_task'] != "") {
                    $other_task = explode(",", $val['other_task']);
                    foreach ($other_task as $k => $v) {
                        $partial_sql .= " AND (FIND_IN_SET ($v, carer_details.other_task) > 0)";
                    }
                }
                if (isset($val['carer_child_work']) && $val['carer_child_work'] != "") {
                    $partial_sql .= " AND carer_details.take_children = " . $val['carer_child_work'] . "";
                }
                $sql1 = "SELECT user_master.id, user_master.first_name, user_master.last_name, user_master.image,
        available_time.day_master_id, available_time.start_time, available_time.end_time, carer_details.description FROM user_master
        LEFT JOIN available_time ON user_master.id = available_time.user_id
        LEFT JOIN carer_details ON user_master.id = carer_details.user_id
        WHERE user_master.status = '1' AND user_master.type_id = '2' AND available_time.status = 1
        AND available_time.day_master_id = " . $val['day_master_id'] . "
        AND available_time.start_time <= '" . $val['start_time'] . "'
        AND available_time.end_time >= '" . $val['end_time'] . "' AND carer_details.is_looking_found = 0
        AND ( 6371 * acos( cos( radians(" . $val['latitude'] . ") ) * cos( radians( user_master.latitude ) ) * 
        cos( radians( user_master.longitude ) - radians(" . $val['longitude'] . ") ) + 
        sin( radians(" . $val['latitude'] . ") ) * sin( radians( user_master.latitude ) ) ) ) <= 60 $partial_sql ORDER BY RAND() LIMIT 3";
                $data1 = Yii::$app->getDb()->createCommand($sql1)->queryAll();
//                    $page = Yii::$app->controller->renderPartial('matchmaking', ['model' => $data1, 'image' => $val['image']], true);
                if (count($data1) > 0) {
                    if ($val['image'] != "")
                        $family_img = Yii::$app->params['baseUrl'] . 'web/uploads/frontend/family_picture/preview/' . $val['image'];
                    else
                        $family_img = Yii::$app->params['baseUrl'] . 'web/frontend/images/avatar.jpg';
                    $carer_html = '';
                    foreach ($data1 AS $key1 => $val1) {
                        if ($val1['image'] != "")
                            $carer_img = Yii::$app->params['baseUrl'] . 'web/uploads/frontend/carer_picture/preview/' . $val1['image'];
                        else
                            $carer_img = Yii::$app->params['baseUrl'] . 'web/frontend/images/avatar.jpg';
                        $carer_html .= '<table border="0" cellpadding="5" cellspacing="0" style="background:#fff; box-shadow:rgba(0, 0, 0, 0.24) 1px 1px 12px; margin-bottom:15px; padding:8px; width:100%">
                                    <tbody>
                                        <tr>
                                            <td><img alt="" src="' . $carer_img . '" style="height:100px; width:100px" /></td>
                                            <td>
                                                <div style="text-align:left; color: #253848; padding-bottom: 10px; font-size: 15px;">' . $val1['first_name'] . ' ' . $val1['last_name'] . '</div>
                                                <div style="text-align:left; color: #666; padding-bottom: 10px; font-size: 12px;">5 Reviews <span style="color:#1ca97f">(3.5)</span></div>
                                                <div style="text-align:left; color: #666; padding-bottom: 10px; font-size: 12px;">' . $val1['description'] . '</div>
                                            </td>
                                            <td><a href="' . Yii::$app->params['baseUrl'] . 'search/carerprofile?car_id=' . base64_encode($val1['id']) . '" style="padding:15px 20px;background:#253848;color:#fff;font-size:15px;display: inline-block;width: 80px;text-decoration: none;text-align: center;">View profile</a></td>
                                        </tr>
                                    </tbody>
                                </table>';
                    }
                    $email_setting = $this->get_email_data('matchmaking', []);
                    $email_data = [
                        'to' => $val['email'],
                        'subject' => $email_setting['subject'],
                        'data' => ['message' => $email_setting['body'], 'NAME' => $val['first_name'], 'IMAGE' => $val['image'], 'CONTENT' => $carer_html]
                    ];
                    $this->SendMail($email_data);
                    echo $val['email'] . '<br>';
                }
            }
        }
    }

    public function get_email_data($code, $replacedata = array()) {
        $email_data = Email::find()
                ->where(['email_code' => $code])
                ->one();
        $email_msg = "";
        $email_array = array();
        $email_msg = $email_data->body;
        $subject = $email_data->subject;
        if (!empty($replacedata)) {
            foreach ($replacedata as $key => $value) {
                $email_msg = str_replace("{{" . $key . "}}", $value, $email_msg);
            }
        }
        return array('body' => $email_msg, 'subject' => $subject);
    }

    public function SendMail($data) {
        if ($data['data']['IMAGE'] != "")
            $family_img = Yii::$app->params['baseUrl'] . 'web/uploads/frontend/carer_picture/preview/' . $data['data']['IMAGE'];
        else
            $family_img = Yii::$app->params['baseUrl'] . 'web/frontend/images/avatar.jpg';
        $template = '<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    </head>
    <body>
        <table style="max-width: 620px; width: 100%; margin: 0 auto; border-collapse: collapse; border: none; font-family:verdana; background-color: #fff; border: transparent; font-family:Arial, Helvetica, sans-serif;">
            <tbody>
            <tr>
                <td style="padding: 15px 30px;background-color: #e7ffff;"><img src="' . Yii::$app->params['baseUrl'] . 'web/frontend/images/logo.png" alt="" ></td>
                <td style="width: 40%;padding: 20px 20px;background-color:#e7ffff;text-align: right;color: #ffffff;vertical-align: top;font-size: 14px;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="color: #007775;font-size:14px;text-align: right;">Hi ' . $data['data']['NAME'] . '</td>
                            <td style=" text-align: right;width:50px;"><img src="' . $family_img . '" alt="" style="width:40px;height:40px;border-radius: 50%;"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding:40px 30px; background:url(' . Yii::$app->params['baseUrl'] . 'web/frontend/images/banner-bg.png) center top; text-align: center;color: #ffffff;vertical-align: middle;">
                    <div style="color: #fff;font-size: 22px;"> Carers found based on your criteria </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;background-color: #e7ffff; padding:20px 15px 5px;">
                    ' . $data['data']['CONTENT'] . '
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;padding: 8px 15px;background-color: #e7ffff;color:#4d4a4a;font-size:13px;line-height: 20px;">
                    {{email_message}} 
                </td>
            </tr>
            <tr>
                    <td colspan="2" style="text-align: center; padding:10px; background-color: #e7ffff;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="5" style="border-top: 1px solid #dcdcdc;padding-top: 10px;">
                            <tr>
                                <td style="text-align:left;">
                                    <div style="text-align:left; color: #010101; padding-bottom:7px; font-size: 13px; font-weight:500;">Sent by EdenWoolf Team </div>
                                    <div style="text-align:left; color: #383636; padding-bottom: 10px; font-size: 12px;">Copyright © 2018 Edenwolf. All rights reserved.</div>
                                </td>
                                <td style="text-align:right; width:15%;">
                                    <table width="80" border="0" cellspacing="0" cellpadding="2">
                                        <tr>
                                            <td><a href="#"><img src="' . Yii::$app->params['baseUrl'] . 'web/frontend/images/soc-f.png" alt=""></a></td>
                                            <td><a href="#"><img src="' . Yii::$app->params['baseUrl'] . 'web/frontend/images/soc-t.png" alt=""></a></td>
                                            <td><a href="#"><img src="' . Yii::$app->params['baseUrl'] . 'web/frontend/images/soc-p.png" alt=""></a></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>';
        $content = $data['data']['message'];
        $view = str_replace('{{email_message}}', $content, $template);
        Yii::$app->mailer->compose()
                ->setTo($data['to'])
                ->setFrom(['admin@edenwoolf.com' => 'edenwoolf'])
                ->setSubject(isset($data['subject']) ? $data['subject'] : '')
                ->setHtmlBody($view)
                ->send();
    }

}

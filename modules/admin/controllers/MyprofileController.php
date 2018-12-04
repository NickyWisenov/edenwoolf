<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use app\models\UserMaster;

class MyprofileController extends AdminController {

    public function actionIndex() {
        $data['active_tab'] = 'tab_1_1';
        $model = new UserMaster;
        $admin_user = UserMaster::findOne(Yii::$app->user->id);
        if (isset($_POST['tab']) && $_POST['tab'] == 'tab_1_1') {
            $data['active_tab'] = 'tab_1_1';
            $admin_user->scenario = 'admin_update_profile';
            $image_pre = $admin_user->image;
            if ($admin_user->load(Yii::$app->request->post())) {
                $admin_user->image = $_POST['UserMaster']['image'];
                if ($admin_user->image == '') {
                    $admin_user->image = $image_pre;
                }
                $admin_user_validate = $admin_user->validate();
                if ($admin_user_validate) {
                    $admin_user->email = strtolower($admin_user->email);
                    $admin_user->updated_at = date('Y-m-d H:i:s');
                    $admin_user->save(false);
                    Yii::$app->session->setFlash('success', 'Profile updated successfully.');
                    return $this->refresh();
                }
            }
        }
        if (isset($_POST['tab']) && $_POST['tab'] == 'tab_1_2') {
            $data['active_tab'] = 'tab_1_2';
            $admin_user->scenario = 'admin_password';
            if ($admin_user->load(Yii::$app->request->post())) {
                if ($admin_user->validate()) {
                    $new_password = Yii::$app->request->post('UserMaster')['new_password'];
                    $admin_user->password = Yii::$app->getSecurity()->generatePasswordHash($new_password);
                    $admin_user->updated_at = date('Y-m-d H:i:s');
                    $admin_user->save(false);
                    Yii::$app->session->setFlash('success', 'Password changed successfully.');
                    return $this->refresh();
                }
            }
        }
        $data['admin'] = $admin_user;
        $data['model'] = $admin_user;
        return $this->render('index', $data);
    }

    public function actionAdimage() {
        if (Yii::$app->request->isAjax) {
            $data_msg = [];
            if (isset($_POST['g'])) {
                $str = file_get_contents("php://input");
                $decoded = urldecode($str);
                $exp = explode(',', $decoded);
                $base64 = array_pop($exp);
                $data = base64_decode($base64);
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randstring = str_shuffle($characters);
                $new_image_name = time() . $this->rand_string(6) . ".jpg";
                $user_temp_image_with_path = Yii::$app->basePath . '/web/uploads/admin/profile_picture/original/' . $new_image_name;
                file_put_contents($user_temp_image_with_path, $data);
                $base_path = Yii::$app->getUrlManager()->getBaseUrl() . '/uploads/admin/profile_picture/';
                Image::getImagine()->open($user_temp_image_with_path)->thumbnail(new Box(350, 550))->save(Yii::$app->basePath . '/web/uploads/admin/profile_picture/preview/' . $new_image_name, ['quality' => 90]);
                Image::getImagine()->open($user_temp_image_with_path)->thumbnail(new Box(180, 250))->save(Yii::$app->basePath . '/web/uploads/admin/profile_picture/thumb/' . $new_image_name, ['quality' => 90]);
                $data_msg['img'] = $new_image_name;
                $data_msg['imgUrlO'] = Yii::$app->getUrlManager()->getBaseUrl() . '/uploads/admin/profile_picture/original/' . $new_image_name;
                $data_msg['imgUrlP'] = Yii::$app->getUrlManager()->getBaseUrl() . '/uploads/admin/profile_picture/preview/' . $new_image_name;
                $data_msg['res'] = 1;
            } else {
                $data_msg['res'] = 0;
            }
            echo json_encode($data_msg);
            exit();
        }
    }

}

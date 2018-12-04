<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\UserMaster;

class DashboardController extends AdminController {

    public function actionIndex() {
        $data_msg = [];
        $user_id = Yii::$app->user->id;
        $total_carer = UserMaster::find()
                ->where(['<>', 'status', '3'])
                ->andWhere(['=', 'type_id', '2'])
                ->count();
        $total_family = UserMaster::find()
                ->where(['<>', 'status', '3'])
                ->andWhere(['=', 'type_id', '3'])
                ->count();
        $data_msg['total_carer'] = $total_carer;
        $data_msg['total_family'] = $total_family;
        return $this->render('index', $data_msg);
    }

}

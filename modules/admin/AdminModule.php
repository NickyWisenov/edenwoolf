<?php

namespace app\modules\admin;

use Yii;

/**
 * admin module definition class
 */
class AdminModule extends \yii\base\Module {

    /**
     * @inheritdoc
     */
    public $defaultRoute = 'auth/login';
    public $controllerNamespace = 'app\modules\admin\controllers';
    public $layout = 'column1';

    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();
        $this->modules = [
            'settings' => [
                'class' => 'app\modules\admin\modules\settings\SettingsModule',
            ],
        ];

        // custom initialization code goes here

        \Yii::$app->set('user', [
            'class' => 'yii\web\User',
            'identityClass' => 'app\models\UserMaster',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => 'edenwoolf_admin_user', // unique for backend
                'httpOnly' => true
            ],
            'loginUrl' => ['admin/auth/login'],
//            'enableSession'=>true,
//            'idParam' => 'admin_id', //this is important !
        ]);
        \Yii::$app->set('session', [
            'class' => 'yii\web\Session',
            'name' => '_edenwoolfbackendSession', // unique for backend
            'savePath' => sys_get_temp_dir(), // a temporary folder on backend
        ]);
    }

    public function beforeAction($action) {

        // your custom code here, if you want the code to run before action filters,
        // which are triggered on the [[EVENT_BEFORE_ACTION]] event, e.g. PageCache or AccessControl
        $route = $action->controller->id . '/' . $action->id;
        $publicPages = array(
            'auth/login',
            'auth/forgotpassword',
            'auth/lockscreen',
        );
        if (!in_array($route, $publicPages) && Yii::$app->user->isGuest) {
            Yii::$app->user->loginRequired();
        } else if (in_array($route, $publicPages) && !Yii::$app->user->isGuest) {
            Yii::$app->response->redirect(['admin/dashboard/index']);
        } else {
            return true;
        }
        // other custom code here
    }

}

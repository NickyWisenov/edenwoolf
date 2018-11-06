<?php

namespace app\assets\backend;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LockAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
        'backend/assets/global/plugins/font-awesome/css/font-awesome.min.css',
        'backend/assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
        'backend/assets/global/plugins/bootstrap/css/bootstrap.min.css',
        'backend/assets/global/plugins/uniform/css/uniform.default.css',
        'backend/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
        'backend/assets/global/css/components.min.css',
        'backend/assets/global/css/plugins.min.css',
        'backend/assets/pages/css/lock-2.min.css',
    ];
    public $js = [
        ['frontend/js/jquery-2.2.4.min.js', 'position' => \yii\web\View::POS_HEAD],
        'backend/assets/global/plugins/bootstrap/js/bootstrap.min.js',
        'backend/assets/global/plugins/js.cookie.min.js',
        'backend/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
        'backend/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'backend/assets/global/plugins/jquery.blockui.min.js',
        'backend/assets/global/plugins/uniform/jquery.uniform.min.js',
        'backend/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
        'backend/assets/global/plugins/backstretch/jquery.backstretch.min.js',
        'backend/assets/global/scripts/app.min.js',
        'backend/assets/pages/scripts/lock-2.min.js',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];

}

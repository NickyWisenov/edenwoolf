<?php

namespace app\assets\backend;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class MainAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
        'backend/assets/global/plugins/font-awesome/css/font-awesome.min.css',
        'backend/assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
        'backend/assets/global/plugins/bootstrap/css/bootstrap.min.css',
        'backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css',
        'backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css',
        'backend/assets/global/css/components.min.css',
        'backend/assets/layouts/layout2/css/layout.min.css',
        'backend/assets/layouts/layout2/css/themes/blue.min.css',
        'frontend/css/bootstrap_select2/select2.min.css',
        'frontend/css/bootstrap_select2/select2-bootstrap.css',
        'backend/assets/layouts/layout2/css/custom.min.css',
        'backend/assets/global/css/plugins.min.css',
        'backend/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
        'backend/custom/css/style.css',
    ];
    public $js = [
        ['frontend/js/jquery-2.2.4.min.js', 'position' => \yii\web\View::POS_HEAD],
        'backend/assets/global/plugins/bootstrap/js/bootstrap.min.js',
        'backend/assets/global/plugins/js.cookie.min.js',
        'backend/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
        'backend/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'backend/assets/global/plugins/moment.min.js',
        'backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js',
        'backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js',
        'backend/assets/global/plugins/morris/morris.min.js',
        'backend/assets/global/plugins/counterup/jquery.waypoints.min.js',
        'backend/assets/global/plugins/counterup/jquery.counterup.min.js',
        'backend/assets/global/scripts/app.min.js',
        'backend/assets/global/plugins/ckeditor/ckeditor.js',
        'backend/assets/layouts/layout2/scripts/layout.min.js',
        'backend/assets/layouts/global/scripts/quick-sidebar.min.js',
        'backend/assets/pages/scripts/dashboard.js',
        'backend/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
        'frontend/css/bootstrap_select2/select2.full.js',
        'backend/custom/js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}

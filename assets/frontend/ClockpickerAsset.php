<?php

namespace app\assets\frontend;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ClockpickerAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/custom/css/jquery.datetimepicker.css',
        'frontend/custom/css/jquery.timepicker.css',
//        'frontend/custom/clockpicker/bootstrap-clockpicker.css',
    ];
    public $js = [
        ['frontend/custom/js/jquery.datetimepicker.full.js', 'position' => \yii\web\View::POS_BEGIN],
        ['frontend/custom/js/jquery.timepicker.js', 'position' => \yii\web\View::POS_BEGIN],
//        ['frontend/custom/clockpicker/bootstrap-clockpicker.js', 'position' => \yii\web\View::POS_BEGIN],
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}

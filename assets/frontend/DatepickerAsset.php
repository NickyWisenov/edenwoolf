<?php

namespace app\assets\frontend;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class DatepickerAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/custom/datepicker/bootstrap-datepicker.css',
    ];
    public $js = [
        ['frontend/custom/datepicker/bootstrap-datepicker.js', 'position' => \yii\web\View::POS_BEGIN],
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}

<?php

namespace app\assets\backend;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class CropperAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/custom/cropper/cropper.min.css',
        'frontend/custom/cropper/main.css',
    ];
    public $js = [
        'frontend/custom/cropper/vue.min.js',
        'frontend/custom/cropper/cropper.min.js',
        'frontend/custom/cropper/main.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}

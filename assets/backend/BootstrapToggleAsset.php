<?php

namespace app\assets\backend;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class BootstrapToggleAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'backend/custom/css/bootstrap-toggle.min.css',
    ];
    public $js = [
        'backend/custom/js/bootstrap-toggle.min.js',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];

}

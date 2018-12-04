<?php

namespace app\assets\frontend;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class MaterialAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
     public $css = [
        'frontend/custom/css/materialize.css',
    ];
    public $js = [
        'frontend/custom/js/materialize.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];

}

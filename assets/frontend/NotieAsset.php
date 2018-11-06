<?php

namespace app\assets\frontend;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class NotieAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/custom/notie-master/notie.min.css',
    ];
    public $js = [
        'frontend/custom/notie-master/notie.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}

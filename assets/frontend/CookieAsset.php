<?php

namespace app\assets\frontend;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class CookieAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        ['frontend/custom/js/jquery.cookie.js', 'position' => \yii\web\View::POS_BEGIN],
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}

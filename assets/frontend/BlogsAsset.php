<?php

namespace app\assets\frontend;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class BlogsAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/custom/css/blogs.css',
    ];
    public $js = [
        'frontend/custom/js/blogs.js',
        'frontend/js/social-share-count.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}

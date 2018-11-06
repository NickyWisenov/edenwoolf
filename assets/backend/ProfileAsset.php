<?php

namespace app\assets\backend;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ProfileAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'backend/assets/pages/css/profile.min.css',
    ];
    public $js = [
        'backend/assets/global/plugins/jquery.sparkline.min.js',
        'backend/assets/pages/scripts/profile.min.js',
    ];
    public $depends = [
        'app\assets\backend\MainAsset',
    ];

}

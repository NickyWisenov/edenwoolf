<?php

namespace app\assets\frontend;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LogJobAssets extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'frontend/custom/js/log-job.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}

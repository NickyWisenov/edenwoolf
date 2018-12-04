<?php

namespace app\assets\frontend;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class MainAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/css/bootstrap.min.css',
        'frontend/css/font-awesome.min.css',
        'frontend/css/bootstrap-select.css',
        'frontend/css/bootstrap_select2/select2.min.css',
        'frontend/css/bootstrap_select2/select2-bootstrap.css',
        'frontend/css/animate.css',
        'frontend/css/all-pages.css',
        'frontend/css/main.css',
        'frontend/css/responsive.css',
        'frontend/css/animate.min.css',
        'https://fonts.googleapis.com/css?family=Fredericka+the+Great|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese',
        'https://fonts.googleapis.com/css?family=Archivo+Narrow:400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext',
        'frontend/custom/css/style.css',
        
    ];
    public $js = [
        ['frontend/js/jquery-2.2.4.min.js', 'position' => \yii\web\View::POS_HEAD],
        ['frontend/js/jquery-ui.min.js', 'position' => \yii\web\View::POS_HEAD],
        'frontend/js/bootstrap.min.js',
        'frontend/js/main.js',
        'frontend/js/bootstrap-select.js',
        'frontend/js/jquery.nicescroll.js',
        'frontend/css/bootstrap_select2/select2.full.js',
//        'frontend/custom/EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js',
        'frontend/custom/js/script.js',
        'frontend/custom/js/global.js',
        'frontend/custom/js/carer_search.js',
        'frontend/custom/js/family_search.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}

<?php

namespace app\assets\frontend;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AutocompleteAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/custom/EasyAutocomplete-1.3.5/easy-autocomplete.min.css',
        'frontend/custom/EasyAutocomplete-1.3.5/easy-autocomplete.themes.min.css',
    ];
    public $js = [
        'frontend/custom/EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}

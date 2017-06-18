<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins/bootstrap-3.3.2/css/bootstrap.min.css',
        'plugins/font-awesome-4.2.0/css/font-awesome.min.css',
        'css/theme.css',
    ];
    public $js = [
        'plugins/jquery.easing-1.3.pack.js',
        'plugins/magnific-popup/jquery.magnific-popup.min.js',
        'js/theme.js',
        'plugins/bootstrap-3.3.2/js/bootstrap.min.js',
        'plugins/jquery.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];
}

<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class ProfileAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bundle.min.css',
    ];
    public $js = [
        'mt/js/slick.min.js',
        'mt/js/myslick.js',
        'mt/js/scripts.js',
        'js/init/rating.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}

<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class ProfileAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [

    ];

    public $js = [
        'js/plugins/jquery.magnific-popup.min.js',
        'mt/js/slick.min.js',
        'mt/js/myslick.js',
        'mt/js/scripts.js',
        'js/init/rating.js',
        'js/review-controls.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'frontend\assets\TemplateV2Asset'
    ];
}

<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class TemplateV2Asset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bundle.min.css',
    ];
    public $js = [
        'js/bundle.js'
    ];

    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );

    public $publishOptions = [
        'only' => [
            'fonts/*',
            'js/*',
        ]
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}

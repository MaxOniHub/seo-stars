<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class OwlCarouselAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

    ];
    public $js = [
        'js/plugins/owl.carousel.min.js',
        'js/plugins/jquery.magnific-popup.min.js',
        'js/init/carousel.js',
        'js/init/magnific-popup.js'
    ];


    public $depends = [
        'yii\web\YiiAsset',

    ];
}

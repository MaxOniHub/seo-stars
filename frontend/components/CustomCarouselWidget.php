<?php


namespace frontend\components;

use yii\base\Widget;

/**
 * Class FirstWidget
 * @package app\components
 */
class CustomCarouselWidget extends Widget
{
    public $items = [];


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("carousel-widget/view", ["items" => $this->items]);
    }

}
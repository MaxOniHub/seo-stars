<?php

namespace frontend\components;

/**
 * Class FirstWidget
 * @package app\components
 */
class CompanyCaseslWidget extends CustomCarouselWidget
{
    public $items = [];


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("company-cases-widget/view", ["items" => $this->items]);
    }

}
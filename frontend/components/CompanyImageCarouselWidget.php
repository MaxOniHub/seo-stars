<?php

namespace frontend\components;

/**
 * Class FirstWidget
 * @package app\components
 */
class CompanyImageCarouselWidget extends CustomCarouselWidget
{
    public $items = [];

    public $id = "carousel";

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if ($this->items)
            return $this->render("company-image-carousel-widget/view", ["items" => $this->items, "id" => $this->id]);
}

}
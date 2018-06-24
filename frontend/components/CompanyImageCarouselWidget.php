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

    public $carousel;

    private $bootstrap = "bootstrap-image-carousel-widget/view";

    private $owl = "owl-image-carousel-widget/view";

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if ($this->items)
            return $this->render($this->getCarousel(), ["items" => $this->items, "id" => $this->id]);
    }

    private function getCarousel()
    {
        if ($this->carousel == "bootstrap")
            return $this->bootstrap;

        return $this->owl;
    }

}
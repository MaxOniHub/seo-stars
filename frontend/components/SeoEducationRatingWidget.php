<?php

namespace frontend\components;


class SeoEducationRatingWidget extends CompaniesRatingWidget
{
    public $items;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("seo-education-rating-widget/view", ["items" => $this->items, "widget" => $this]);
    }


}

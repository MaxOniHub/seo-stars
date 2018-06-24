<?php

namespace frontend\components;

use yii\base\Widget;

class SeoEducationRatingWidget extends Widget
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

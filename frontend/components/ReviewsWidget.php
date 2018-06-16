<?php

namespace frontend\components;

use yii\base\Widget;

class ReviewsWidget extends Widget
{
    public $items;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("reviews-widget/view", ["items" => $this->items]);
    }

}

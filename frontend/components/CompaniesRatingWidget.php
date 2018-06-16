<?php

namespace frontend\components;

use yii\base\Widget;

class CompaniesRatingWidget extends Widget
{
    public $items;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("companies-rating-widget/view", ["items" => $this->items]);
    }

}

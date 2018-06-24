<?php

namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Url;

class PersonsRatingWidget extends Widget
{
    public $items;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("persons-rating-widget/view", ["items" => $this->items, "widget" => $this]);
    }

    public function getCompanyLink($alias)
    {
        return Url::toRoute(['main/company', 'alias'=>$alias]);
    }

    public function getPersonLink($alias)
    {
        return Url::toRoute(['person/person', 'alias' => $alias]);
    }
}

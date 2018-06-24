<?php

namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Url;

class ConferenceRatingWidget extends Widget
{
    public $items;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("conference-rating-widget/view", ["items" => $this->items, "widget" => $this]);
    }

    public function getConferenceLink($alias)
    {
        return Url::toRoute(['conference/conference', 'alias'=>$alias]);
    }
}

<?php

namespace frontend\components;

use yii\base\Widget;

class PopularActivityDirectionsWidget extends Widget
{
    public $items;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("popular-activity-directions-widget/view", ["items" => $this->items]);
    }

}

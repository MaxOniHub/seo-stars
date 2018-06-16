<?php

namespace frontend\components;

use yii\base\Widget;

class CountersWidget extends Widget
{
    public $items;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("counters-widget/view", ["items" => $this->items]);
    }

}

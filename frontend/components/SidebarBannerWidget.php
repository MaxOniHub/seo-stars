<?php

namespace frontend\components;

use yii\base\Widget;

class SidebarBannerWidget extends Widget
{
    public $options;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("sidebar-banner-widget/view", ["options" => $this->options]);
    }

}

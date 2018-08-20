<?php

namespace frontend\components;

use yii\base\Widget;

class HorizontalBannerWidget extends Widget
{
    public $options;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if (!$this->options['is_disabled']) {
            return $this->render("horizontal-banner-widget/view", ["options" => $this->options, 'widget' => $this]);
        }
    }

    public function getTarget()
    {
        return $this->options['target'] ? "_blank" : "_self";
    }

}

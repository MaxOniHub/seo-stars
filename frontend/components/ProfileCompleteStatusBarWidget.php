<?php

namespace frontend\components;

use yii\base\Widget;

class ProfileCompleteStatusBarWidget extends Widget
{
    public $percents;

    public $caption;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("profile-complete-status-bar-widget/view", ["percents" => $this->percents, "caption" => $this->caption]);
    }

}

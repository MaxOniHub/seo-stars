<?php

namespace frontend\components;

use yii\base\Widget;

/**
 * Class ProfileCompleteStatusBarWidget
 * @package frontend\components
 */
class ProfileCompleteStatusBarWidget extends Widget
{
    /**
     * @var integer
     */
    public $percents;

    /**
     * @var string
     */
    public $caption;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("profile-complete-status-bar-widget/view", ["widget" => $this]);
    }

    /**
     * @return integer
     */
    public function getValue()
    {
        return $this->percents;
    }

    /**
     * @return string
     */
    public function getCaption()
    {
        return $this->caption . " " . $this->percents . "%";
    }

    /**
     * @return string
     */
    public function getBarColorClass()
    {
        return $this->percents <= 60 ? "progress-bar-warning" : "progress-bar-success";
    }
}

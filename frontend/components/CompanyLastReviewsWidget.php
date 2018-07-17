<?php

namespace frontend\components;

use common\helpers\ReviewColorProvider;
use yii\base\Widget;

class CompanyLastReviewsWidget extends Widget
{
    public $items;


    /** @var ReviewColorProvider */
    private $ReviewColorProvider;

    public function init()
    {
        parent::init();

        $this->ReviewColorProvider = new ReviewColorProvider();
    }

    public function run()
    {
        return $this->render("company-last-reviews-widget/view", ["items" => $this->items, "widget" => $this]);
    }

    public function getDateByFormat($date)
    {
        return date("d.m.Y", $date);
    }

    public function getCompanyUrl($url)
    {
        if (isset($url) && !empty($url))
            return \yii\helpers\Url::to($url);
        return "#";
    }

    public function getColoredClass($stars)
    {
        return $this->ReviewColorProvider->getColoredClass($stars);
    }

}

<?php

namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class ReviewStarsListWidget extends Widget
{
    public $stars = 3;

    private $total_stars = 5;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("review-stars-widget/view", ["widget" => $this]);
    }


    public function getEmptyStars()
    {
        $stars = $this->total_stars - $this->stars;
        if ($stars != 0)
            return $this->generateStars($stars, false);
        return [];
    }

    public function getCurrentStars()
    {
        return $this->generateStars($this->stars, true);
    }

    private function generateStars($stars, $is_filled = false)
    {
        $list = [];
        $i = 1;
        $class = "";
        while ($stars >= $i) {
            if ($is_filled) {
                $class = $stars == $i ? "active" : "";
            }

            $list[] = Html::tag("li", '', ["class" => $class]);
            $i++;
        }
        return $list;
    }
}

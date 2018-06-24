<?php

namespace frontend\components;

use yii\base\Widget;

/**
 * Class CompanySocialNewsWidget
 * @package frontend\components
 */
class CompanySocialNewsWidget extends Widget
{
    public $company;

    public $vk_wall;

    public $fb_wall;

    public $cache_duration;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("company-social-news-widget/view", ["widget" => $this]);
    }

    public function parseStringToLink($string)
    {
        return preg_replace("~(http|https|ftp|ftps)://(.*?)(\s|\n|[,.?!](\s|\n)|$)~", '<a target="_blank" rel="nofollow" href="$1://$2">$1://$2</a>$3',$string);
    }

    public function getDateByFormat($date)
    {
        return date("d.m.Y", $date);
    }

}

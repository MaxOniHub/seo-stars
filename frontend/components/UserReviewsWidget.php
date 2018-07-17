<?php

namespace frontend\components;

use common\helpers\ReviewColorProvider;
use yii\base\Widget;
use yii\helpers\Url;

class UserReviewsWidget extends Widget
{
    public $items;

    private $anon_name = "Аноним";

    /** @var ReviewColorProvider */
    private $ReviewColorProvider;

    public function init()
    {
        parent::init();

        $this->ReviewColorProvider = new ReviewColorProvider();
    }

    public function run()
    {

        return $this->render("user-reviews-widget/view", ["items" => $this->items, "widget" => $this]);
    }

    /**
     * @param $stars
     * @param $attribute
     * @return string
     * @throws \Exception
     */
    public function getStarsWidget($stars)
    {
        return ReviewStarsListWidget::widget(["stars" => $stars]);
    }

    /**
     * @param string $date
     * @return false|string
     */
    public function getDateByFormat($date)
    {
        return date("d:m:Y",$date);
    }

    /**
     * @param object $user
     * @return string
     */
    public function getUserProfileLink($user)
    {
        return $user["user_href"];
    }

    /**
     * @param object $user
     * @return string
     */
    public function getUserAvatarLink($user)
    {
        if (strpos($user["username"], "fb") !== false)
            return "http://graph.facebook.com/" . substr($user["username"], 6) . "/picture?type=large";

        return empty($user["photo"]) ? $this->getAnonAvatar() : $user["photo"];
    }

    public function isAnon($user)
    {
        if ($user["id"] == 0)
        {
            return $this->anon_name;
        }
        return false;
    }

    public function getAnonAvatar()
    {
        return Url::to("/frontend/web/img/anon.jpg");
    }

    public function getColoredClass($stars)
    {
        return $this->ReviewColorProvider->getColoredClass($stars);
    }
}

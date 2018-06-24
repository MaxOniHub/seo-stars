<?php

namespace frontend\components;

use yii\base\Widget;

class ReviewFormWidget extends Widget
{
    private $base_url;

    public function init()
    {
        parent::init();

        $this->base_url = \Yii::$app->request->getHostInfo().\Yii::$app->request->getUrl();
    }

    public function run()
    {
        return $this->render("review-form-widget/view", ["widget" => $this]);
    }

    public function getVkLoginLink()
    {
        $vkauth = new VkAuth(null, null);
        $vkauth->redirect_uri = $this->base_url;

        return $vkauth->getHref();
    }

    public function getFbLoginLink()
    {
        $fbauth = new FbAuth(null, null);
        $fbauth->redirect_uri = $this->base_url;

        return $fbauth->getHref();
    }

}

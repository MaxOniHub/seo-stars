<?php

namespace frontend\components;

use common\helpers\ProfileCompletionColor;
use yii\base\Widget;

class ProfileSocialsIconsWidget extends Widget
{
    public $vk_group;

    public $fb_group;

    public function init()
    {

        parent::init();
    }

    public function run()
    {
        return $this->render("profile-socials-icons-widget/view", [
            "vk" => $this->getVk(),
            "fb" => $this->getFb()
        ]);
    }

    private function getVk()
    {
        return $this->checkSocialGroup($this->vk_group);
    }

    private function getFb()
    {
        return $this->checkSocialGroup($this->fb_group);
    }

    private function checkSocialGroup($group)
    {
        return isset($group) && !empty($group) ? $group : false;
    }



}

<?php

namespace common\models;

/**
 * Class RegionsWidgetSettings
 * @package common\models
 */
class SidebarBannerWidgetSettings extends BannerWidgetSettings
{

    public function getView()
    {
        return "_sidebar_banner";
    }

}
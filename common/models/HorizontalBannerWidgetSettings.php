<?php

namespace common\models;

/**
 * Class HorizontalBannerWidgetSettings
 * @package common\models
 */
class HorizontalBannerWidgetSettings extends BannerWidgetSettings
{
    public function getView()
    {
        return "_horizontal_banner";
    }

}
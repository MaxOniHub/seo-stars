<?php

namespace backend\helpers;

use common\helpers\WidgetsNamesHolder;
use common\models\CountersTopPageWidgetSettings;
use common\models\HorizontalBannerWidgetSettings;
use common\models\RegionsWidgetSettings;
use common\models\SidebarBannerWidgetSettings;
use Yii;

class WidgetsSettingsFactory
{

    public function getWidgetSettings($widget_id)
    {
        if (WidgetsNamesHolder::COUNTERS_TOP_PAGE == $widget_id) {
            /** @var CountersTopPageWidgetSettings */
            return new CountersTopPageWidgetSettings();
        }

        if (WidgetsNamesHolder::REGIONS == $widget_id) {
            /** @var RegionsWidgetSettings */
            return new RegionsWidgetSettings();
        }

        if (WidgetsNamesHolder::SIDEBAR_BANNER == $widget_id) {
            /** @var SidebarBannerWidgetSettings */
            return new SidebarBannerWidgetSettings();
        }

        if (WidgetsNamesHolder::HORIZONTAL_BANNER == $widget_id) {
            /** @var HorizontalBannerWidgetSettings */
            return new HorizontalBannerWidgetSettings();
        }
    }
}
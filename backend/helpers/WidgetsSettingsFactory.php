<?php

namespace backend\helpers;

use common\helpers\WidgetsNamesHolder;
use common\models\CountersTopPageWidgetSettings;
use common\models\RegionsWidgetSettings;
use Yii;

class WidgetsSettingsFactory
{

    public function getWidgetSettings($widget_id)
    {
        if (WidgetsNamesHolder::COUNTERS_TOP_PAGE == $widget_id) {
            /** @var CountersTopPageWidgetSettings $counterTopPage */
            return new CountersTopPageWidgetSettings();
        }

        if (WidgetsNamesHolder::REGIONS == $widget_id) {
            /** @var RegionsWidgetSettings $counterTopPage */
            return new RegionsWidgetSettings();
        }
    }
}
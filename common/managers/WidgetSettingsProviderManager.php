<?php

namespace common\managers;

use common\data_mappers\WidgetSettingsDataMapper;
use common\helpers\WidgetsNamesHolder;

/**
 * Class WidgetSettingsProviderManager
 * @package common\managers
 */
class WidgetSettingsProviderManager
{
    /**
     * @var WidgetSettingsDataMapper
     */
    private $dataMapper;

    /** @var WidgetsNamesHolder */
    private $WidgetsNamesHolder;

    /**
     * WidgetSettingsProviderManager constructor.
     * @param WidgetSettingsDataMapper $dataMapper
     * @param WidgetsNamesHolder $widgetsNamesHolder
     */
    public function __construct(WidgetSettingsDataMapper $dataMapper, WidgetsNamesHolder $widgetsNamesHolder)
    {
        $this->dataMapper = $dataMapper;
        $this->WidgetsNamesHolder = $widgetsNamesHolder;
    }

    /**
     * @return string
     */
    public function getTopPageCountersWidgetSettings()
    {
        $class_name = get_class($this->WidgetsNamesHolder);
        $key = $class_name::COUNTERS_TOP_PAGE;

        return $this->dataMapper->findByPrimaryKey($key)->options;
    }

}
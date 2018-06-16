<?php

namespace common\data_mappers;

use common\interfaces\IWidgetSettings;
use common\models\WidgetsSettings;

/**
 * Class WidgetSettingsDataMapper
 * @package common\data_mappers
 */
class WidgetSettingsDataMapper
{
    /**
     * @var WidgetsSettings
     */
    private $repository;

    private $data;

    /**
     * WidgetSettingsDataMapper constructor.
     * @param WidgetsSettings $widgetsSettings
     */
    public function __construct(WidgetsSettings $widgetsSettings)
    {
        $this->repository = $widgetsSettings;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    public function findByPrimaryKey($key)
    {
        $this->repository = $this->repository->findOne(["key" => $key]);

        return $this->repository;
    }

    /**
     * @param IWidgetSettings $widgetSettings
     * @return bool
     */
    public function load(IWidgetSettings $widgetSettings)
    {
        return $this->repository->load([
                "key" => $widgetSettings->getKey(),
                "title" => $widgetSettings->getTitle(),
                "options" => serialize($widgetSettings->getSettings())], "") && $this->repository->validate();
    }

    public function save()
    {
        return $this->repository->save();
    }

    public function getSettings($widget_key)
    {
        $settings = $this->repository->find()->where(["key" => $widget_key])->asArray()->all();
        if ($settings) {
            $settings["options"] = unserialize($settings["options"]);
            return $settings;
        }
        return false;
    }


}
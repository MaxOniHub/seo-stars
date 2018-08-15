<?php

namespace common\models;

use common\interfaces\IWidgetSettings;
use yii\base\Model;

/**
 * Class RegionsWidgetSettings
 * @package common\models
 */
class SidebarBannerWidgetSettings extends Model implements IWidgetSettings
{
    public $key;
    public $title;

    public $file_path;

    public $url;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'title', 'file_path'], 'string'],
            [['url'], 'url', 'message' => "Указанное значение не является правильным URL (http(s)://example.com)."],
        ];
    }

    public function getView()
    {
        return "_sidebar_banner";
    }

    public function initSettings($options)
    {
        $this->key = $options["key"];
        $this->title = $options["title"];

        $settings = $options["options"];
        $this->file_path = $settings["file_path"];
        $this->url = $settings["url"];

    }

    public function getSettings()
    {
        return $this->getAttributes(null, ["key", "title", "options"]);
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getTitle()
    {
        return $this->title;
    }

}
<?php

namespace common\models;

use common\interfaces\IWidgetSettings;
use yii\base\Model;

/**
 * Class BannerSettingsWidget
 * @package common\models
 */
class BannerWidgetSettings extends Model implements IWidgetSettings
{
    public $key;
    public $title;

    public $file_path;

    public $url;

    public $width;
    public $height;

    public $target;
    public $is_disabled;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'title', 'file_path'], 'string'],
            [['height', 'width'], 'integer', 'min' => 1],
            [['width'], 'integer', 'max' => 780],
            [['target', 'is_disabled'], 'safe'],
            [['url'], 'url', 'message' => "Указанное значение не является правильным URL (http(s)://example.com)."],
        ];
    }

    public function getView()
    {
        return "";
    }

    public function initSettings($options)
    {
        $this->key = $options["key"];
        $this->title = $options["title"];

        $settings = $options["options"];
        $this->file_path = $settings["file_path"];
        $this->url = $settings["url"];
        $this->width = $settings["width"];
        $this->height = $settings["height"];
        $this->is_disabled = $settings["is_disabled"];
        $this->target = $settings["target"];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'width' => 'Ширина (px)',
            'height' => 'Высота (px)',
            'target' => 'Открывать ссылку в новом окне?',
            'is_disabled' => 'Не показывать баннер',
        ];
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
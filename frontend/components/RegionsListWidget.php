<?php

namespace frontend\components;

use common\data_mappers\WidgetSettingsDataMapper;
use common\helpers\WidgetsNamesHolder;
use Yii;
use yii\base\Widget;

/**
 * Class RegionsListWidget
 * @package frontend\components
 */
class RegionsListWidget extends Widget
{

    public $items;

    /** @var WidgetSettingsDataMapper **/
    private $WidgetSettingsDataMapper;

    public function init()
    {
        parent::init();

        $this->WidgetSettingsDataMapper = Yii::createObject(WidgetSettingsDataMapper::class);
    }

    public function run()
    {
        $this->loadData();

        return $this->render("regions-list-widget/view", ["items" => $this->items]);
    }

    private function loadData()
    {
        $settings = $this->WidgetSettingsDataMapper->findByPrimaryKey(WidgetsNamesHolder::REGIONS);

        $this->items = $settings->options;
    }

}

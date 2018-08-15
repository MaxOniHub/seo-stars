<?php
use common\managers\WidgetSettingsProvider;
use common\data_mappers\WidgetSettingsDataMapper;
use common\models\WidgetsSettings;
use common\helpers\WidgetsNamesHolder;
?>
<div class="sidebar">
    <div class="item">
        <?php $widgetSettingsProvider = new WidgetSettingsProvider(new WidgetSettingsDataMapper(new WidgetsSettings()), new WidgetsNamesHolder());?>
        <?= \frontend\components\SidebarBannerWidget::widget(['options' => $widgetSettingsProvider->getSideBarBannerWidgetSettings()]);?>


    </div>
    <div class="item">
        <div class="sidebar-title">Популярные направления</div>
        <?= \frontend\components\PopularActivityDirectionsWidget::widget(["template" => "vertical"]) ?>
    </div>
    <div class="item">
        <div class="sidebar-title">Регионы</div>
        <?= \frontend\components\RegionsListWidget::widget(); ?>
    </div>
</div>
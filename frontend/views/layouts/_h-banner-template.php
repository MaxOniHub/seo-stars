<?php
use common\managers\WidgetSettingsProvider;
use common\data_mappers\WidgetSettingsDataMapper;
use common\models\WidgetsSettings;
use common\helpers\WidgetsNamesHolder;
?>
<div class="row horizontal-banner">
    <div class="col-md-12">
        <?php $widgetSettingsProvider = new WidgetSettingsProvider(new WidgetSettingsDataMapper(new WidgetsSettings()), new WidgetsNamesHolder());?>
        <?= \frontend\components\HorizontalBannerWidget::widget(['options' => $widgetSettingsProvider->getHorizontalBannerWidgetSettings()]);?>
    </div>
</div>
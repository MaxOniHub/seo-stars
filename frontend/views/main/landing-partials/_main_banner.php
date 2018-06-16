<div class="container">
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1 col-lg-11">
            <div class="heading">Рейтинг SEO компаний<br><span class="mark">SEO Stars</span> это:</div>
            <?= \frontend\components\CountersWidget::widget(["items" => $widgetSettings->getTopPageCountersWidgetSettings()])?>
        </div>
    </div>
</div>
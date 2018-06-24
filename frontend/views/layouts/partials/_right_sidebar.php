<div class="sidebar">
    <div class="item">
        <a target="_blank" href="http://alhimiya.com/lp/seo-s-garantiej.html" class="banner image-cover">
            <img src="<?= \yii\helpers\Url::to("/img/banner.jpg")?>">
        </a>
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
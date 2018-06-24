<?php

/* @var $this yii\web\View */

$this->title = $seo->service_title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $seo->service_desc
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $seo->service_keys
]);

?>

<div class="align-center">
    <div class="section-title blue-lined bottom-offset"><?= $seo->service_h1; ?> </div>
</div>
<div class="table-responsive">

    <?= \frontend\components\FullServicesRatingWidget::widget(["items" => $service]) ?>

</div>



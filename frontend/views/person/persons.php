<?php

/* @var $this yii\web\View */

$this->title = $seo->person_tilte;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $seo->person_desc
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $seo->person_keys
]);
?>

<div class="align-center">
    <div class="section-title blue-lined bottom-offset"><?= $seo->person_h1; ?> </div>
</div>
<div class="table-responsive">

    <?= \frontend\components\PersonsRatingWidget::widget(["items" => $persons]) ?>

</div>


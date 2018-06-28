<?php
$this->title = $activity->seo_title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $activity->seo_desc
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $activity->seo_keys
]);

?>

<div class="align-center">
    <div class="section-title blue-lined bottom-offset"><?= $activity->getTitle(); ?></div>
</div>

<!--Компании работающие в этом направлянии деятельности-->

<?=
    \frontend\components\FullCompaniesRatingWidget::widget(["items" => $items])
?>
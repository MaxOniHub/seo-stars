<?php
/**
 * @var \common\models\ActivityDirection $activity
 */

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
    <div class="section-title blue-lined bottom-offset"><?= $activity->h1_title; ?></div>
</div>

<?=
    \frontend\components\FullCompaniesRatingWidget::widget(["items" => $items])
?>

<?php if (!empty($activity->about)):?>
    <div class="section-subtitle small top-offset align-left md-align-center">О <?= $activity->title; ?></div>
    <div class="paragraph vertical-offset align-left md-align-center">
        <?= $activity->about?>
    </div>
<?php endif; ?>

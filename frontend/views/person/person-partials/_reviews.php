<?php

use yii\widgets\Pjax;

/**
 * @var \common\interfaces\IPersonEntity $person
 */

Pjax::begin(['id' => 'my-pjax', 'timeout' => 500000]); ?>

<div class="row middle-xs">
    <div class="col-xs-12 col-md-6">
        <div class="section-subtitle small top-offset-small bottom-offset-large align-left md-align-center">
            Отзывы о <?= $person->getName(); ?></div>
    </div>
    <?php if (isset($comments[0])): ?>
        <?= \frontend\components\ReviewsSortControlsWidget::widget(
                [
                   "alias" => $alias,
                   "target_url" => "person/person",
                   "sort" => $sort,
                   "sort_desc" => $sort_desc
                ])?>
    <?php endif; ?>
</div>
<?php Pjax::begin(['id' => 'pjax-reviews', 'timeout' => 500000]); ?>

<?= \frontend\components\UserReviewsWidget::widget(["items" => $comments]); ?>

<?php Pjax::end(); ?>

<?php Pjax::end(); ?>

<?php if (empty($comments)): ?>
    <?= $this->render("/alerts/_no_comments_alert")?>
<?php endif; ?>


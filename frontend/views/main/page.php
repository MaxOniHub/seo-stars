<?php

/* @var $this yii\web\View */

$this->title=$page->seo_title;

$this->registerMetaTag([ 
    'name'=>'description', 
    'content'=>$page->seo_desc
]); 
$this->registerMetaTag([ 
    'name'=>'keywords', 
    'content'=>$page->seo_keys
]);
?>

<div class="align-center">
    <div class="section-title blue-lined bottom-offset">
        <?php if ($page->h2): ?>
            <?= $page->h2; ?>
        <?php else: ?>
            <?= $page->h1; ?>
        <?php endif; ?>
    </div>
</div>
<div class="table-responsive">

    <?= \frontend\components\SeoEducationRatingWidget::widget(["items" => $companies]) ?>

</div>


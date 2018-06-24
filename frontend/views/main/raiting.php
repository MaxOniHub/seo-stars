<?php

/* @var $this yii\web\View */

$this->title=$seo->raiting_title;

$this->registerMetaTag([ 
    'name'=>'description', 
    'content'=>$seo->raiting_desc
]); 
$this->registerMetaTag([ 
    'name'=>'keywords', 
    'content'=>$seo->raiting_keys
]);

?>

<div class="align-center">
    <div class="section-title blue-lined bottom-offset"><?= $seo->raiting_h1; ?> </div>
</div>
<div class="table-responsive">

    <?= \frontend\components\FullCompaniesRatingWidget::widget(["items" => $companies]) ?>

</div>




<?php

/* @var $this yii\web\View */
$this->title=$seo->conference_title;

$this->registerMetaTag([ 
    'name'=>'description', 
    'content'=>$seo->conference_desc
]); 
$this->registerMetaTag([ 
    'name'=>'keywords', 
    'content'=>$seo->conference_keys
]);

?>

<div class="align-center">
    <div class="section-title blue-lined bottom-offset"><?= $seo->conference_h1; ?> </div>
</div>
<div class="table-responsive">

    <?= \frontend\components\ConferenceRatingWidget::widget(["items" => $conference]) ?>

</div>


<?php
$imgPath=Yii::$app->params['imgPath'];
?>
<div class="row middle-xs center-xs start-md">
    <div class="col-xs-12 col-md-6 align-left md-align-center">
        <div class="section-title large pink-lined"><?= $company["name"]; ?></div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="company-logo">
            <div class="image-contain">
                <?= \yii\helpers\Html::img($imgPath.$company["logo"], ["alt" => $company["name"]])?>
            </div>
        </div>
    </div>
</div>

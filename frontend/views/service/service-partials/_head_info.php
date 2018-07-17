
<div class="row middle-xs center-xs start-md">
    <div class="col-xs-12 col-md-6 align-left md-align-center">
        <div class="section-title large pink-lined"><?= $service->getName(); ?></div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="company-logo">
            <div class="image-contain">
                <?= \yii\helpers\Html::img($service->getLogo(), ["alt" => $service->getName()])?>
            </div>
        </div>
    </div>
</div>

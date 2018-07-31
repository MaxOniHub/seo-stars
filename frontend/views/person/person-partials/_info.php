<?php
$imgPath = Yii::$app->params['imgPath'];
/**
 * @var \common\interfaces\IPersonEntity $person
 */
?>

<div class="person-info">
    <div class="row">
        <div class="col-xs-12 col-md-6 align-left md-align-center">
            <ul class="person-info-list">
                <li>
                    <i class="icon icon-office-block"></i>
                    <div class="info">
                        <div class="name">Компания</div>
                        <div class="value"><?= $person->getCompanyName(); ?></div>
                    </div>
                </li>
                <li>
                    <i class="icon icon-information"></i>
                    <div class="info">
                        <div class="name">Сервис</div>
                        <div class="value"><?= $person->getServiceName(); ?></div>
                    </div>
                </li>
                <li>
                    <i class="icon icon-microphone"></i>
                    <div class="info">
                        <div class="name">Персоны</div>
                        <div class="value">-</div>
                    </div>
                </li>
                <li>
                    <i class="icon icon-star-3"></i>
                    <div class="info">
                        <div class="name">Рейтинг</div>
                        <div class="value"><?= $person->getRating()?></div>
                    </div>
                </li>
            </ul>
            <div class="socials">
                <div class="social-title">Соцсети:</div>
                <?= \frontend\components\ProfileSocialsIconsWidget::widget(["vk_group" => $person["vk_group"], "fb_group" => $person["fb_group"]]) ?>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 first-xs last-md">
            <div class="image-cover">
                <!-- img.vertical чтобы растянуть вертикальное изображение -->
                <?= \yii\helpers\Html::img($person->getLogo(), ["alt" => $person->getName()])?>
            </div>
        </div>
    </div>
</div>

<div class="section-subtitle small top-offset bottom-offset align-left md-align-center">О персоне</div>
<div class="about-person-carousel owl-carousel owl-loaded owl-drag">
<?= $person->getAbout();?>
</div>
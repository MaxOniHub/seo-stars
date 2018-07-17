<?php
$imgPath = Yii::$app->params['imgPath'];

/**
 * @var \common\models\Service $service
 */

?>

    <div class="person-info">
        <div class="row">
            <div class="col-xs-12 col-md-6 align-left md-align-center">
                <ul class="person-info-list">
                    <li>
                        <i class="icon icon-grid-world"></i>
                        <div class="info">
                            <div class="name">Сайт</div>
                            <?php if ($service["site_link"] == 1) : ?>
                                <?= \yii\helpers\Html::a($service["site"], $service["site"], ["target" => "_blank"]) ?>
                            <?php else: ?>
                                <?= $service["site"]; ?>
                            <?php endif; ?>
                        </div>
                    </li>
                    <li>
                        <i class="icon icon-call-answer"></i>
                        <div class="info">
                            <div class="name">Телефон</div>
                            <div class="value"><?= $service->tel; ?></div>
                        </div>
                    </li>
                    <li>
                        <i class="icon icon-mail-black-envelope-symbol"></i>
                        <div class="info">
                            <div class="name">E-mail</div>
                            <div class="value"><?= $service->email; ?></div>
                        </div>
                    </li>
                    <li>
                        <i class="icon icon-microphone"></i>
                        <div class="info">
                            <div class="name">Персоны</div>
                            <div class="value"><?= $service->peoples_string ?></div>
                        </div>
                    </li>
                    <li>
                        <i class="icon icon-star-3"></i>
                        <div class="info">
                            <div class="name">Рейтинг</div>
                            <div class="value"><?= $service->getRating() ?></div>
                        </div>
                    </li>
                    <li>
                        <i class="icon icon-star-3"></i>
                        <div class="info">
                            <div class="name">Отзывы</div>
                            <div class="value"><?= $service->reviews; ?></div>
                        </div>
                    </li>
                </ul>
                <div class="social-title">Соцсети:</div>
                <?= \frontend\components\ProfileSocialsIconsWidget::widget(["vk_group" => $service->vk_group, "fb_group" => $service->fb_group]) ?>
            </div>
            <div class="col-xs-12 col-md-6 first-xs last-md">
                <div class="image-cover">
                    <!-- img.vertical чтобы растянуть вертикальное изображение -->
                    <?= \yii\helpers\Html::img($service->getLogo(), ["alt" => $service->getName()]) ?>
                </div>
            </div>
        </div>
    </div>

<?php if (!empty($service['about'])): ?>
    <div class="section-subtitle small top-offset bottom-offset align-left md-align-center">О сервисе</div>
    <div class="about-person-carousel owl-carousel owl-loaded owl-drag">
        <?= $service['about']; ?>
    </div>
<?php endif; ?>
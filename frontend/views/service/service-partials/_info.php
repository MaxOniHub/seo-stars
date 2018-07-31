<?php

use common\helpers\ValueChecker;

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
                                <div class="value"> <?= \yii\helpers\Html::a($service["site"], $service["site"], ["target" => "_blank"]) ?> </div>
                            <?php else: ?>
                                <div class="value"><?= $service["site"]; ?></div>
                            <?php endif; ?>
                        </div>
                    </li>
                    <li>
                        <i class="icon icon-call-answer"></i>
                        <div class="info">
                            <div class="name">Телефон</div>
                            <div class="value"><?= ValueChecker::checkValue($service->tel); ?></div>
                        </div>
                    </li>
                    <li>
                        <i class="icon icon-mail-black-envelope-symbol"></i>
                        <div class="info">
                            <div class="name">E-mail</div>
                            <div class="value"><?= ValueChecker::checkValue($service->email); ?></div>
                        </div>
                    </li>
                </ul>

            </div>
            <div class="col-xs-12 col-md-6 align-left md-align-center">
                <ul class="person-info-list">
                    <li>
                        <i class="icon icon-microphone"></i>
                        <div class="info">
                            <div class="name">Персоны</div>
                            <div class="value"><?= ValueChecker::checkValue($service->peoples_string); ?></div>
                        </div>
                    </li>
                    <li>
                        <i class="icon icon-star-3"></i>
                        <div class="info">
                            <div class="name">Рейтинг</div>
                            <div class="value"><?= ValueChecker::checkValue($service->raiting); ?></div>
                        </div>
                    </li>
                    <li>
                        <i class="icon icon-star-3"></i>
                        <div class="info">
                            <div class="name">Отзывы</div>
                            <div class="value"><?= ValueChecker::checkValue($service->reviews); ?></div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="socials" style="padding-left: 15px">
                <div class="social-title">Соцсети:</div>
                <?= \frontend\components\ProfileSocialsIconsWidget::widget(["vk_group" => $service->vk_group, "fb_group" => $service->fb_group]) ?>
            </div>
        </div>
    </div>

<?php if (!empty($service['about'])): ?>
    <div class="section-subtitle small top-offset bottom-offset align-left md-align-center">О сервисе</div>
    <div class="about-person-carousel owl-carousel owl-loaded owl-drag">
        <?= $service['about']; ?>
    </div>
<?php endif; ?>
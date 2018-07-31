<?php

use yii\helpers\Url;

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
                            <div class="name">Компания</div>
                            <div class="value">
                                <?php if ($conference->company) : ?>
                                    <?= \yii\helpers\Html::a($conference->company->getName(), Url::toRoute(['main/company', 'alias' => $conference->company->alias])); ?>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                    <li>
                        <i class="icon icon-call-answer"></i>
                        <div class="info">
                            <div class="name">Персона</div>
                            <div class="value">
                                <?php if ($conference->person) : ?>
                                    <?= \yii\helpers\Html::a($conference->person->getName(), Url::toRoute(['person/person', 'alias' => $conference->person->alias])) ?>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                    <li>
                        <i class="icon icon-mail-black-envelope-symbol"></i>
                        <div class="info">
                            <div class="name">Регион</div>
                            <div class="value"><?= $conference->regions; ?></div>
                        </div>
                    </li>
                    <li>
                        <i class="icon icon-microphone"></i>
                        <div class="info">
                            <div class="name">Сайт</div>
                            <div class="value">
                                <?php if ($conference["site_link"] == 1) : ?>
                                    <?= \yii\helpers\Html::a($conference["site"], $conference["site"], ["target" => "_blank"]) ?>
                                <?php else: ?>
                                    <?= $conference["site"]; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                    <li>
                        <i class="icon icon-star-3"></i>
                        <div class="info">
                            <div class="name">Рейтинг</div>
                            <div class="value"><?= $conference->getRating() ?></div>
                        </div>
                    </li>
                    <li>
                        <i class="icon icon-star-3"></i>
                        <div class="info">
                            <div class="name">Отзывы</div>
                            <div class="value"><?= $conference->reviews; ?></div>
                        </div>
                    </li>
                </ul>
                <?php if ($conference->vk_group || $conference->fb_group): ?>
                    <div class="socials">
                        <div class="social-title">Соцсети:</div>
                        <?= \frontend\components\ProfileSocialsIconsWidget::widget(["vk_group" => $conference->vk_group, "fb_group" => $conference->fb_group]) ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>

    </div>

<?php if (!empty($conference['about'])) : ?>
    <div class="section-subtitle small top-offset bottom-offset align-left md-align-center">О сервисе</div>
    <div class="about-person-carousel owl-carousel owl-loaded owl-drag">
        <?= $conference['about']; ?>
    </div>
<?php endif; ?>
<div class="company-info align-left md-align-center">
    <ul class="company-info-list top-offset">
        <li>
            <i class="icon icon-international-delivery"></i>
            <div class="info">
                <div class="name">Регион</div>
                <div class="value"><?= $company["regions"]?> </div>
            </div>
        </li>
        <li>
            <i class="icon icon-grid-world"></i>
            <div class="info">
                <div class="name">Сайт</div>
                <div class="value">
                    <?php if($company["site_link"]==1) :?>
                        <?= \yii\helpers\Html::a($company["site"], $company["site"], ["target" => "_blank"])?>
                    <?php  else: ?>
                        <?= $company["site"]; ?>
                    <?php endif;?>

                </div>
            </div>
        </li>
        <li>
            <i class="icon icon-call-answer"></i>
            <div class="info">
                <div class="name">Телефон</div>
                <div class="value"><?= !empty($company["tel"]) ? $company["tel"] : "-" ?></div>
            </div>
        </li>
        <li>
            <i class="icon icon-mail-black-envelope-symbol"></i>
            <div class="info">
                <div class="name">E-MAIL</div>
                <div class="value"><?= !empty($company["email"]) ? $company["email"] : "-"?>
                </div>
            </div>
        </li>
        <li>
            <i class="icon icon-star-3"></i>
            <div class="info">
                <div class="name">Рейтинг</div>
                <div class="value"><?= $company->getRating(); ?></div>
            </div>
        </li>
        <li>
            <i class="icon icon-feedback-2"></i>
            <div class="info">
                <div class="name">Отзывы</div>
                <div class="value"><?= $company["reviews"]; ?></div>
            </div>
        </li>
        <li>
            <i class="icon icon-multiple-users-silhouette"></i>
            <div class="info">
                <div class="name">Люди</div>
                <div class="value"><?= !empty($company["people_string"]) ? $company["people_string"] : "-" ?></div>
            </div>
        </li>
        <li>
            <i class="icon icon-clock-symbol-of-circular-shape"></i>
            <div class="info">
                <div class="name">Возраст домена</div>
                <div class="value"><?= $company["year"]?></div>
            </div>
        </li>
    </ul>

    <div class="socials">
        <div class="social-title">Соцсети:</div>

        <?= \frontend\components\ProfileSocialsIconsWidget::widget(["vk_group" => $company["vk_group"], "fb_group" => $company["fb_group"]]) ?>
    </div>
</div>
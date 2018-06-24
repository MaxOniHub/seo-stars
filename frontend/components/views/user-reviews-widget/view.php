<ul class="testimonials-list-vertical md-top-offset align-left md-align-center">
<?php foreach ($items as $item): ?>

<li>
    <div class="testimonial-card border <?= $widget->getColoredClass($item["stars"])?>">

        <div class="round-photo">
            <div class="image-cover">
                <?php if ($anon = $widget->isAnon($item["user"])): ?>
                    <?= \yii\helpers\Html::img( $widget->getAnonAvatar(), ["alt" => $anon])?>
                <?php else: ?>
                    <?= \yii\helpers\Html::img( $widget->getUserAvatarLink($item["user"]), ["alt" => $item["user"]["name"]])?>
                <?php endif;?>
            </div>
        </div>
        <div class="info">
            <div class="name">
                <?php if ($anon = $widget->isAnon($item["user"])): ?>
                    <?= $anon; ?>
                <?php else: ?>
                    <?= \yii\helpers\Html::a($item["user"]["name"], $widget->getUserProfileLink($item["user"]), ["target" => "_blank"])?>
                <?php endif;?>

            </div>
            <div class="date"> <?= $widget->getDateByFormat($item["date"]);?></div>
            <div class="star-rating">
                <?= $widget->getStarsWidget($item["stars"]);?>
            </div>
        </div>

        <div class="text">
            <?=$item["text"];?>
        </div>
        <div class="rating align-right">
            <div class="title">Рейтинг отзыва:</div>
            <div class="buttons">
                <button type="button" class="up"  onclick="likecomm(<?= $item["id"]; ?>)"><i class="icon icon-angle-arrow-down"></i></button>
                <div class="value"><?= $item["likes"]; ?> </div>
                <button type="button"  onclick="dislikecomm(<?= $item["id"]; ?>)" class="down"><i class="icon icon-angle-arrow-down"></i></button>
            </div>
        </div>

</div>
</li>
<?php endforeach; ?>

</ul>

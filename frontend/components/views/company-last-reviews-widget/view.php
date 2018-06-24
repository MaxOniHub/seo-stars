<ul class="testimonials-list-row">
    <?php foreach ($items as $item): ?>
        <li>
            <div class="testimonial-card shadow <?= $widget->getColoredClass($item["stars"])?>">
                <div class="round-photo">
                    <div class="image-cover">
                        <img src="<?= \yii\helpers\Url::to("img/testimonials/user.jpg") ?>" alt="User">
                    </div>
                </div>
                <div class="info">
                    <div class="name"><?= $item["user"]["name"]; ?></div>
                    <div class="date"><?= $widget->getDateByFormat($item["date"]); ?></div>
                </div>
                <a href="<?= $widget->getCompanyUrl($item["gisturl"])?>" class="link">Отзывы о <?= $item["gistname"]; ?></a>
                <div class="text">
                    <?= $item["text"]; ?>
                </div>
            </div>
        </li>
    <?php endforeach; ?>

</ul>
<ul class="star-rating" style="width: 100%">

    <?php foreach ($widget->getCurrentStars() as $list): ?>
        <?= $list ?>
    <?php endforeach; ?>

    <?php foreach ($widget->getEmptyStars() as $list): ?>
        <?= $list ?>
    <?php endforeach; ?>

</ul>
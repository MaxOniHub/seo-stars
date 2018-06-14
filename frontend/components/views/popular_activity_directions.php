<?php

?>
<ul>
    <?php foreach ($items as $item) : ?>
        <?php $color = $item["hex_border_color"]; ?>
        <li style="color: <?= $color ?>; border-color: <?= $color ?>"><?= \yii\helpers\Html::a($item["title"], ["types/" . $item["alias"]]) ?></li>
    <?php endforeach; ?>
</ul>

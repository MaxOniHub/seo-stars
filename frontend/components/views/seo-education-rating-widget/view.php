<?php

use yii\helpers\Url;

?>
<div class="table-responsive">
    <table class="table td-width sm-table-layout-auto md-change-size">
        <thead>
        <tr>
            <th>Место</th>
            <th>Название</th>
            <th>Теги</th>
            <th>Рейтинг</th>
            <th>Отзывы</th>
        </tr>
        </thead>
        <tbody>

        <?php

        foreach ($items as $key => $item): ?>
            <?php $index = $key + 1; ?>
            <?php $link = Url::toRoute(['main/company', 'alias' => $item['alias']]); ?>
            <tr>
                <td class="numb"><?= $index ?></td>
                <td><?= \yii\helpers\Html::a($item["name"], $link) ?></td>
                <td class="md-none"><?= $item["tags"] ?></td>
                <td><?= $item["raiting"] ?></td>
                <td><?= $item["reviews"] ?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>
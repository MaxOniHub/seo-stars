<?php

use yii\helpers\Url;

?>
<div class="table-responsive">
    <table class="table td-width sm-table-layout-auto md-change-size">
        <thead>
        <tr>
            <th>Место</th>
            <th>Название</th>
            <th class="md-none">Теги</th>
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

                <td class="company">
                    <div class="md-hidden">
                        <?= \yii\helpers\Html::a($item["name"], $link) ?>
                    </div>
                    <div class="md-visible">
                        <div class="company-title" data-toggle='#row-<?= $index ?>'><?= $item["name"] ?></div>
                        <div id="row-<?= $index ?>" class="content">
                            <div class="cell">
                                <div class="title">Теги:</div>
                                <div class="value light">
                                    <?= $item["tags"] ?>
                                </div>
                            </div>
                            <a href="<?= $link ?>" class="more-link">Подробнее<i class="icon icon-right-arrow"></i></a>
                        </div>
                    </div>
                </td>

                <td class="md-none"><?= $item["tags"] ?></td>
                <td><?= $widget->getRating($item); ?></td>
                <td><?= $item["reviews"] ?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>
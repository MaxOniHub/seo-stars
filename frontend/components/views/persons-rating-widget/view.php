<div class="table-responsive">
    <table class="table td-width sm-table-layout-auto md-change-size">
        <thead>
        <tr>
            <th>Место</th>
            <th>Название</th>
            <th class="md-none">Компания</th>
            <th>Рейтинг</th>
            <th>Отзывы</th>
        </tr>
        </thead>
        <tbody>

        <?php

        foreach ($items as $key => $item): ?>
            <?php $index = $key + 1; ?>
            <tr>
                <td class="numb"><?= $index ?></td>
                <td>

                    <div class="md-hidden">
                        <?= \yii\helpers\Html::a($item["name"], $widget->getPersonLink($item["alias"])) ?>
                    </div>
                    <div class="md-visible">
                        <div class="company-title" data-toggle='#row-<?= $index ?>'>
                            <?= $item["name"] ?>
                        </div>
                        <div id="row-<?= $index ?>" class="content">
                            <div class="cell">
                                <div class="title">Компания:</div>
                                <div class="value light">
                                    <?= $item["company"]["name"] ?>
                                </div>
                            </div>
                            <a href="<?= $widget->getPersonLink($item["alias"]) ?>" class="more-link">Подробнее<i
                                        class="icon icon-right-arrow"></i></a>
                        </div>
                    </div>

                </td>
                <td class="md-none">
                    <?= \yii\helpers\Html::a($item["company"]["name"], $widget->getCompanyLink($item["company"]["alias"])) ?>
                </td>
                <td><?= $item["raiting"] ?></td>
                <td><?= $item["reviews"] ?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>
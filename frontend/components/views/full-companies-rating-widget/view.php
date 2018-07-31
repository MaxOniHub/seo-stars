
<div class="table-responsive">
    <table class="table td-width sm-table-layout-auto md-change-size">
        <thead>
        <tr>
            <th>Место</th>
            <th>Компания</th>
            <th class="md-none">Регион</th>
            <th class="md-none">Возраст домена</th>
            <th class="md-none">Кейсы</th>
            <th>Рейтинг</th>
            <th>Отзывы</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($items as $key => $item): ?>
            <?php $index = $key+1; ?>
            <tr class="<?= $widget->getClass($item["profile_complete_status"]) ?>">
                <td class="numb"><?= $index?></td>
                <td class="company">
                    <div class="md-hidden">
                        <?= \yii\helpers\Html::a($item["name"], $widget->getCompanyLink($item["alias"])) ?>
                    </div>
                    <div class="md-visible">
                        <div class="company-title" data-toggle='#row-<?= $index ?>'><?= $item["name"] ?></div>
                        <div id="row-<?= $index ?>" class="content">
                            <div class="cell">
                                <div class="title">Регион:</div>
                                <div class="value light">
                                    <?= $item["regions"] ?>
                                </div>
                            </div>
                            <div class="cell">
                                <div class="title">Возраст домена:</div>
                                <div class="value">
                                    <?= $item["year"] ?>
                                </div>
                            </div>
                            <div class="cell">
                                <div class="title">Кейсы :</div>
                                <div class="value">
                                    <?= $widget->countCases($item["casesFiles"])?>
                                </div>
                            </div>
                            <a href="<?= $widget->getCompanyLink($item["alias"]) ?>" class="more-link">Подробнее<i class="icon icon-right-arrow"></i></a>
                        </div>
                    </div>
                </td>
                <td class="md-none"><?= $item["regions"]?></td>
                <td class="md-none"><?= $item["year"]?></td>
                <td class="md-none"><?= $widget->countCases($item["casesFiles"])?></td>
                <td><?= $widget->getRating($item); ?></td>
                <td><?= $item["reviews"]?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>
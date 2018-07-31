<div class="table-responsive">
    <table class="table calc-width">
        <thead>
        <tr>
            <th>Место</th>
            <th>Компания</th>
            <th>Кейсы</th>
            <th>Рейтинг</th>
            <th>Отзывы</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($items as $key => $item): ?>
            <tr class="<?= $widget->getClass($item["profile_complete_status"]) ?>">
                <td class="numb"><?= $key+1 ?></td>
                <td class="company"><?= $widget->getTargetUrl($item); ?></td>
                <td><?= $widget->countCases($item["casesFiles"])?></td>
                <td><?= $widget->getRating($item); ?></td>
                <td><?= $item["reviews"]?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>
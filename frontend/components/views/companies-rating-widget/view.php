<style>
    .table tbody .stage-full td:last-child:after
    {
        position: initial;
    }
</style>
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

        <?php foreach ($items as $key => $item): ?>
            <tr class="stage-full">
                <td class="numb"><?= $key+1 ?></td>
                <td class="company"><?= $item["name"] ?></td>
                <td><?= $widget->countCases($item["casesFiles"])?></td>
                <td><?= $item["raiting"]?></td>
                <td><?= $item["reviews"]?></td>
                <td style="background-color: <?= $widget->getColor($item["profile_complete_status"])?>"></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>
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
                <td class="numb"><?= $key ?></td>
                <td class="company"><?= $item["name"] ?></td>
                <td>3897</td>
                <td><?= $item["rating"]?></td>
                <td><?= $item["reviews"]?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>
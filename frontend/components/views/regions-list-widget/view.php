<ul class="regions-list">

<?php foreach ($items as $key => $item): ?>
    <li><?= \yii\helpers\Html::a($item["region_name"], $item["region_link"], ["target" => "_blank"])?></li>
<?php endforeach;?>
    <li><a href="#">Все регионы...</a></li>
</ul>

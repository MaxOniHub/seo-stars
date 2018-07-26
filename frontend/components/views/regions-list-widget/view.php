<?php
use yii\helpers\Url;
?>
<ul class="regions-list">

<?php
foreach ($items as $key => $item): ?>
    <li><?= \yii\helpers\Html::a($item["region_name"], $item["region_link"])?></li>
<?php endforeach;?>
    <li><a href="<?= Url::toRoute(['page/all-regions']);?>">Все регионы...</a></li>
</ul>

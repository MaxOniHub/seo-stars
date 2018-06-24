<ul class="regions-list">

<?php foreach ($items as $key => $item): ?>
    <li><a href="<?= $item["region_link"] ?>"><?= $item["region_name"]?></a></li>
<?php endforeach;?>
    <li><a href="#">Все регионы...</a></li>
</ul>

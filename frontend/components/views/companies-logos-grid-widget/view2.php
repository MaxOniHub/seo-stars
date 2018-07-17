<?php

use yii\helpers\Url;

?>

<div class="col-xs-12 col-md-3 col-md-offset-1 md-col-bottom-offset">
    <ul class="rating-companies-list vertical">
        <li>
            <a href="<?= Url::toRoute([$target_url, 'alias' => $items[0]['alias']]); ?>" class="link">
                <div class="image-contain">
                    <img src="<?= $img_dir . $items[0]['logo']; ?>" alt="<?= $items[0]['name']; ?>"/>
                </div>
            </a>
        </li>
    </ul>
</div>
<?php
$limit = 4;
?>
<div class="col-xs-12 col-md-7">
    <ul class="rating-companies-list">
        <?php foreach ($items as $key => &$item): ?>
            <?php $next = current($items) ?>
            <?php if ($key < $limit): ?>
                <li>
                    <a href="<?= Url::toRoute([$target_url, 'alias' => $next['alias']]); ?>" class="link">
                        <div class="image-contain">
                            <img src="<?= $img_dir . $next['logo']; ?>" alt="<?= $next['name']; ?>"/>
                        </div>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>

    </ul>
</div>

<?php

echo $this->render("view1", ["items" => array_slice($items, $limit+2), "img_dir"=> $img_dir, "target_url" => $target_url]);


<?php

use yii\helpers\Url;

$limit = 5;
?>
<div class="col-xs-12 col-md-10 col-md-offset-1">
    <ul class="rating-companies-list horizontal top-offset">
        <?php foreach ($items as $key => $item): ?>
            <?php if ($key < $limit) : ?>
                <li>
                    <a href="<?= Url::toRoute([$target_url, 'alias' => $item['alias']]); ?>" class="link">
                        <div class="image-contain">
                            <img src="<?= $img_dir  . $item['logo']; ?>" alt="<?= $item['name']; ?>"/>
                        </div>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>

    </ul>
</div>

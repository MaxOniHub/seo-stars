<?php
use yii\helpers\Url;

?>
<div class="col-xs-12 col-md-6 end-md">
    <div class="row">

        <ul class="sort">
            <li>Сортировать по:</li>
            <?php
            if ($sort == 'popular' && !$sort_desc) { ?>
                <li>
                    <a href="<?= Url::toRoute([$target_url, 'alias' => $alias, 'sort' => 'popular', 'sort_desc' => 'desc']); ?>" <?php if ($sort == "popular") echo 'class="active"'; ?>>Популярность</a>
                </li>
            <?php } else { ?>
                <li>
                    <a href="<?= Url::toRoute([$target_url, 'alias' => $alias, 'sort' => 'popular']); ?>" <?php if ($sort == "popular") echo 'class="active"'; ?>>Популярность<?php if ($sort_desc && $sort == "popular") { ?>
                            <span class="glyphicon glyphicon-sort" aria-hidden="true"></span><?php } ?>
                </li>
            <?php } ?>
            <?php if (!$sort && !$sort_desc) { ?>
                <li>
                    <a href="<?= Url::toRoute([$target_url, 'alias' => $alias, 'sort_desc' => 'desc']); ?>" <?php if (!$sort) echo 'class="active"'; ?>>Дата</a>
                </li>
            <?php } else { ?>
                <li>
                    <a href="<?= Url::toRoute([$target_url, 'alias' => $alias]); ?>" <?php if (!$sort) echo 'class="active"'; ?>>Дата<?php if ($sort_desc && !$sort) { ?>
                            <span class="glyphicon glyphicon-sort" aria-hidden="true"></span><?php } ?></a>
                </li>
            <?php } ?>
            <?php if ($sort == 'bad-good' && !$sort_desc) { ?>
                <li>
                    <a href="<?= Url::toRoute([$target_url, 'alias' => $alias, 'sort' => 'bad-good', 'sort_desc' => 'desc']); ?>" <?php if ($sort == "bad-good") echo 'class="active"'; ?>>Негатив/Позитив</a>
                </li>
            <?php } else { ?>
                <li>
                    <a href="<?= Url::toRoute([$target_url, 'alias' => $alias, 'sort' => 'bad-good']); ?>" <?php if ($sort == "bad-good") echo 'class="active"'; ?>>Негатив/Позитив<?php if ($sort_desc && $sort == "bad-good") { ?>
                            <span class="glyphicon glyphicon-sort" aria-hidden="true"></span><?php } ?></a>
                </li>
            <?php } ?>
        </ul>


    </div>
</div>
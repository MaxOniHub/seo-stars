<?php

use yii\helpers\Url;
use yii\widgets\Pjax;

Pjax::begin(['id' => 'my-pjax', 'timeout' => 500000]); ?>

    <div class="row middle-xs">
        <div class="col-xs-12 col-md-6">
            <div class="section-subtitle small top-offset-small bottom-offset-large align-left md-align-center">
                Отзывы о <?= $company->name; ?></div>
        </div>
        <?php if (isset($comments[0])): ?>
            <div class="col-xs-12 col-md-6 end-md">
                <div class="row">

                    <ul class="sort">
                        <li>Сортировать по:</li>
                        <?php if ($sort == 'popular' && !$sort_desc) { ?>
                            <li>
                                <a href="<?= Url::toRoute(['main/company', 'alias' => $alias, 'sort' => 'popular', 'sort_desc' => 'desc']); ?>" <?php if ($sort == "popular") echo 'class="active"'; ?>>Популярность</a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="<?= Url::toRoute(['main/company', 'alias' => $alias, 'sort' => 'popular']); ?>" <?php if ($sort == "popular") echo 'class="active"'; ?>>Популярность<?php if ($sort_desc && $sort == "popular") { ?>
                                        <span class="glyphicon glyphicon-sort" aria-hidden="true"></span><?php } ?>
                            </li>
                        <?php } ?>
                        <?php if (!$sort && !$sort_desc) { ?>
                            <li>
                                <a href="<?= Url::toRoute(['main/company', 'alias' => $alias, 'sort_desc' => 'desc']); ?>" <?php if (!$sort) echo 'class="active"'; ?>>Дата</a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="<?= Url::toRoute(['main/company', 'alias' => $alias]); ?>" <?php if (!$sort) echo 'class="active"'; ?>>Дата<?php if ($sort_desc && !$sort) { ?>
                                        <span class="glyphicon glyphicon-sort" aria-hidden="true"></span><?php } ?></a>
                            </li>
                        <?php } ?>
                        <?php if ($sort == 'bad-good' && !$sort_desc) { ?>
                            <li>
                                <a href="<?= Url::toRoute(['main/company', 'alias' => $alias, 'sort' => 'bad-good', 'sort_desc' => 'desc']); ?>" <?php if ($sort == "bad-good") echo 'class="active"'; ?>>Негатив/Позитив</a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="<?= Url::toRoute(['main/company', 'alias' => $alias, 'sort' => 'bad-good']); ?>" <?php if ($sort == "bad-good") echo 'class="active"'; ?>>Негатив/Позитив<?php if ($sort_desc && $sort == "bad-good") { ?>
                                        <span class="glyphicon glyphicon-sort" aria-hidden="true"></span><?php } ?></a>
                            </li>
                        <?php } ?>
                    </ul>


                </div>
            </div>

        <?php endif; ?>
    </div>
        <?php Pjax::begin(['id' => 'pjax-reviews', 'timeout' => 500000]); ?>

        <?= \frontend\components\UserReviewsWidget::widget(["items" => $comments]); ?>

        <?php Pjax::end(); ?>

<?php Pjax::end(); ?>

<?php if (empty($comments)): ?>
    <div class="row">
        <div style="width: 100%" class="alert alert-warning" role="alert">Отзывов пока что нет.</div>
    </div>
<?php endif; ?>


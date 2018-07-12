<?php

use yii\helpers\Url;

?>

<div class="col-xs-12 col-md-6 end-md">

    <div class="dropdown-wrapper">
        <img src="/frontend/web/img/review_loader.gif" class="review-loader">
        <div class="dropdown-title">
            Сортировать по:
        </div>
        <div class="ae-dropdown dropdown">
            <div class="ae-select">
                <span class="ae-select-content">Дата</span>
                <i class="icon icon-angle-arrow-down"></i>
            </div>
            <ul class="dropdown-menu ae-hide">


                <li title="Популярность">
                    <span>Популярность</span>
                    <span>
                          <a href="<?= Url::toRoute([$target_url, 'id' => $entity_id, 'gist'=> $gist, 'sort' => 'popular']); ?>">
                              <i class="icon icon-angle-arrow-down up"></i>
                          </a>
                    </span>
                    <span>
                        <a href="<?= Url::toRoute([$target_url, 'id' => $entity_id, 'gist'=> $gist, 'sort' => 'popular', 'sort_desc' => 'desc']); ?>">
                              <i class="icon icon-angle-arrow-down down"></i>
                        </a>
                    </span>
                </li>

                <li title="Дата">
                    <span>Дата</span>
                    <span>
                        <a href="<?= Url::toRoute([$target_url, 'id' => $entity_id, 'gist'=> $gist]); ?>">
                                <i class="icon icon-angle-arrow-down up"></i>
                        </a>
                    </span>
                    <span>
                        <a href="<?= Url::toRoute([$target_url, 'id' => $entity_id, 'gist'=> $gist, 'sort_desc' => 'desc']); ?>">
                              <i class="icon icon-angle-arrow-down down"></i>
                        </a>
                    </span>
                </li>

                <li title="Негатив/Позитив">
                    <span>Негатив/Позитив</span>
                    <span>
                         <a href="<?= Url::toRoute([$target_url, 'id' => $entity_id, 'gist'=> $gist, 'sort' => 'bad-good']); ?>" >
                               <i class="icon icon-angle-arrow-down up"></i>
                         </a>
                    </span>
                    <span>
                        <a href="<?= Url::toRoute([$target_url, 'id' => $entity_id, 'gist'=> $gist, 'sort' => 'bad-good', 'sort_desc' => 'desc']); ?>">
                            <i class="icon icon-angle-arrow-down down"></i>
                        </a>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php

?>

<div class="col-xs-12 col-md-12 col-md-offset-1" id="review-block">
    <div class="write-review top-offset align-left md-align-center">

        <div class="title">Довольны работой компании или разочарованы?<br><span class="mark">Оставьте свой отзыв!</span>
        </div>
        <div class="social-title">Войти через:</div>
        <ul class="social-list">
            <li>
                <a href="<?= $widget->getVkLoginLink();  ?>"><i class="icon icon-vk"></i></a>
            </li>
            <li>
                <a href="<?= $widget->getFbLoginLink();?>"><i class="icon icon-facebook-6"></i></a>
            </li>
            <li class="anonymous">
                <button type="button" class="btn active" data-toggle="#addReview">Анонимно</button>
            </li>
        </ul>

        <?= $this->render("_form") ?>

    </div>
</div>





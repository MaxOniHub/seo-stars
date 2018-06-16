<?php
use yii\helpers\Url;
?>
<ul class="main-menu" data-desktop="#desktopMainMenu" data-tablet="#tabletMainMenu">
    <li><a <?php if(strripos(Url::to(''), "raiting")!==false) echo 'class="activelink"';?> href="<?=Url::toRoute(['main/raiting']);?>">Компании</a></li>
    <li><a <?php if(strripos(Url::to(''), "top-seo-education")!==false) echo 'class="activelink"';?> href="<?=Url::toRoute(['main/page', 'alias'=>'top-seo-education']);?>">Обучение</a></li>
    <li><a <?php if(strripos(Url::to(''), "service")!==false) echo 'class="activelink"';?> href="<?=Url::toRoute(['service/services']);?>">Сервисы</a></li>
    <li><a <?php if(strripos(Url::to(''), "person")!==false) echo 'class="activelink"';?> href="<?=Url::toRoute(['person/persons']);?>">Персоны</a></li>
    <li><a <?php if(strripos(Url::to(''), "conference")!==false) echo 'class="activelink"';?> href="<?=Url::toRoute(['conference/conferences']);?>">Конференции</a></li>
</ul>
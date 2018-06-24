
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-md-2 col-md-offset-1 col-lg-3">
                <a href="<?= Yii::$app->homeUrl; ?>" class="logo-header">
                    <img src="<?= \yii\helpers\Url::to("/img/logo-header.png")?>" alt="Seo-stars">
                </a>
            </div>
            <div id="desktopMainMenu" class="col-xs-8 end-xs col-md-8 start-md">

                <?= $this->render("_menu"); ?>
                <button class="mobile-menu-btn"><i class="icon icon-menu-button"></i></button>
                <div id="tabletMainMenu" class="mobile-menu">
                    <button class="mobile-menu-btn mobile-menu-btn-close"><i class="icon icon-menu-button"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
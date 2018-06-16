<?php
/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;


\frontend\assets\TemplateV2Asset::register($this);
?>

<?php $this->beginPage() ?>

    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-81824028-1', 'auto');
            ga('send', 'pageview');

        </script>
        <?= $theme->metrics; ?>
        <?php $this->head() ?>

    </head>
    <body>
    <?php $this->beginBody() ?>
    <header class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-md-2 col-md-offset-1 col-lg-3">
                    <a href="index.html" class="logo-header">
                        <img src="<?= \yii\helpers\Url::to("img/logo-header.png")?>" alt="Seo-stars">
                    </a>
                </div>
                <div id="desktopMainMenu" class="col-xs-8 end-xs col-md-8 start-md">

                    <?= $this->render("partials/_menu"); ?>
                    <button class="mobile-menu-btn"><i class="icon icon-menu-button"></i></button>
                    <div id="tabletMainMenu" class="mobile-menu">
                        <button class="mobile-menu-btn mobile-menu-btn-close"><i class="icon icon-menu-button"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <?= $content; ?>

    </main>
    <?= $this->render("footer-layout-v2"); ?>

    <?php $this->endBody() ?>
    </body>
    </html>

<?php $this->endPage() ?>
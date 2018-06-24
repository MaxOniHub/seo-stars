<?php
/* @var $this \yii\web\View */

/* @var $content string */


\frontend\assets\TemplateV2Asset::register($this);
?>

<?php $this->beginPage() ?>

    <?= $this->render("header-layout-v2")?>
    <body>
    <?php $this->beginBody() ?>
    <header class="main-header none-margin">
    <?= $this->render("partials/_top_site_bar"); ?>

    <main>
        <?= $content; ?>

    </main>
    <?= $this->render("footer-layout-v2"); ?>

    <?php $this->endBody() ?>
    </body>
    </html>

<?php $this->endPage() ?>
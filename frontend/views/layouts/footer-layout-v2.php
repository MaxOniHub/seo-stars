<?php
use yii\helpers\Url;

?>
<footer class="main-footer">
    <div class="container">
        <div class="row center-xs start-ms">
            <div class="col-xs-12 col-ms-2 col-ms-offset-1">
                <a href="<?=Url::toRoute(['main/index']);?>" class="logo-footer">
                    <img src="<?=\yii\helpers\Url::to("/img/logo-footer.png")?>" alt="Seo-stars">
                </a>
            </div>
            <div class="col-xs-12 col-ms-2 col-sm-2">
                <ul class="footer-menu">
                    <li>
                        <a href="<?=Url::toRoute(['main/index']);?>">Главная</a>
                    </li>
                    <li>
                        <a href="<?=Url::toRoute(['/app']);?>">Заявка на продвижение</a>
                    </li>
                    <li>
                        <a href="<?=Url::toRoute(['main/pages']);?>">Карта сайта</a>
                    </li>
                    <li>
                        <a href="<?= Url::toRoute(['main/contact']);?>">Контакты</a>
                    </li>
                    <li>
                        <a href="<?=Url::toRoute(['main/about']);?>">О сайте</a>
                    </li>
                </ul>
            </div>

            <div class="col-xs-12 col-ms-2 footer-menu">
                <?= Yii::$app->theme->getFooterLinks();?>
            </div>

            <div class="col-xs-12 col-ms-2 footer-menu">
                <?= Yii::$app->theme->getFooterLinks2();?>
            </div>

            <div class="col-xs-12 col-ms-2">
                <ul class="social-list">
                    <li>
                        <a href="https://www.facebook.com/SEO-Stars-TOP-336355266796266/" target="_blank"><i class="icon icon-facebook-6"></i></a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCnuuKjaqyDSUT4Xt1PDMmXQ/" target="_blank"><i class="icon icon-youtube-2"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>


<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter38821510 = new Ya.Metrika({
                    id:38821510,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/38821510" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
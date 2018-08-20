
    <div class="align-center">
        <h2 class="section-title blue-lined top-offset bottom-offset">Рейтинг SEO компаний - SEO Stars</h2>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
            <div class="section-description align-center">
                <?php if($themeSettings->main_text): ?>
                    <?= $themeSettings->main_text; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-5 col-lg-offset-1">
            <div class="section-subtitle top-offset fixed-height md-bottom-offset align-center"><?= $companyRatings->getSettings()->title3 ?>
            </div>
            <?= \frontend\components\CompaniesRatingWidget::widget(["items" => $companyRatings->getTopInRussia()]) ?>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-5">
            <div class="section-subtitle top-offset fixed-height md-bottom-offset align-center"><?= $companyRatings->getSettings()->title4 ?>
            </div>
            <?= \frontend\components\CompaniesRatingWidget::widget(["items" => $companyRatings->getTopInUkraine()]) ?>
        </div>
    </div>



<div class="align-center">
    <h2 class="section-title blue-lined bottom-offset">Рейтинг SEO компаний</h2>
</div>

<div class="row">
    <?= \frontend\components\CompaniesLogosGridWidget::widget(["items" => $companyRatings->getTopSEO(), "target_url" => "main/company", "template" => 2])?>
</div>
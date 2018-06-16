<div class="align-center">
    <div class="section-title blue-lined bottom-offset">Рейтинг SEO компаний</div>
</div>

<div class="row">
    <?= \frontend\components\CompaniesLogosGridWidget::widget(["items" => $companyRatings->getTopSEO(), "target_url" => "main/company", "template" => 2])?>
</div>
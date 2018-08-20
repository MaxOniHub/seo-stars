<div class="align-center">
    <h2 class="section-title pink-lined top-offset bottom-offset">Рейтинг компаний по обучению SEO</h2>
</div>

<div class="row">
    <?= \frontend\components\CompaniesLogosGridWidget::widget(["items" => $companyRatings->getTopTeachingSEO(), "target_url" => "main/company", "template" => 2])?>
</div>
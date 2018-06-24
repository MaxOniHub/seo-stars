<div class="container">
    <div class="align-center">
        <div class="section-title pink-lined bottom-offset-large">Последние отзывы</div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-lg-10 col-lg-offset-1">
            <?= \frontend\components\CompanyLastReviewsWidget::widget(["items" => $reviews])?>
        </div>
    </div>
</div>
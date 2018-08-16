<?= \frontend\components\ReviewsWidget::widget(
    [
        "gist" => "company_id",
        "entity_id" => $company->id,
        "entity_name" => $company->name,
        "sort" => $sort,
        "sort_desc" => $sort_desc,
        "comments" => $comments
    ]);
?>
<div class="row">
<?= \frontend\components\ReviewFormWidget::widget();?>
</div>
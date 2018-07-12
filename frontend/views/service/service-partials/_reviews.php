<?= \frontend\components\ReviewsWidget::widget(
    [
        "gist" => "service_id",
        "entity_id" => $service->id,
        "entity_name" => $service->name,
        "sort" => $sort,
        "sort_desc" => $sort_desc,
        "comments" => $comments
    ]);
?>




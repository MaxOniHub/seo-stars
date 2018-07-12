<?= \frontend\components\ReviewsWidget::widget(
    [
        "gist" => "person_id",
        "entity_id" => $person->id,
        "entity_name" => $person->name,
        "sort" => $sort,
        "sort_desc" => $sort_desc,
        "comments" => $comments
    ]);
?>




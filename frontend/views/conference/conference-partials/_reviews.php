<?= \frontend\components\ReviewsWidget::widget(
    [
        "gist" => "conference_id",
        "entity_id" => $conference->id,
        "entity_name" => $conference->name,
        "sort" => $sort,
        "sort_desc" => $sort_desc,
        "comments" => $comments
    ]);
?>


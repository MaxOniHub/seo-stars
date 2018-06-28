<?php

$this->title = $person->seo_title;

$this->registerMetaTag([
    'name'=>'description', 
    'content'=>$person->seo_desc
]); 
$this->registerMetaTag([ 
    'name'=>'keywords', 
    'content'=>$person->seo_keys
]);

?>

<?= $this->render("person-partials/_head_info", ["person" => $person])?>

<?= $this->render("person-partials/_info", ["person" => $person])?>

<?= $this->render("person-partials/_reviews", [
    "model" => $model,
    "person" => $person,
    "comments" => $comments,
    "sort" => $sort,
    "sort_desc" => $sort_desc,
    "alias" => $alias,
    "fbhref" => $fbhref,
    "vkhref" => $vkhref
]) ?>

<?= \frontend\components\SocialNewsWidget::widget(
    [
        "entity" => $person,
        "vk_wall" => $wall,
        "fb_wall" => $fb_wall,
        "cache_duration" => $wall_cach
    ]);
?>

<?= $this->render("/alerts/_auth_alert")?>

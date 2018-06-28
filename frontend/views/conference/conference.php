<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;
use common\models\Review;
use yii\widgets\Pjax;
use yii\web\View;
$this->title = $conference->seo_title;
$this->registerMetaTag([ 
    'name'=>'description', 
    'content'=>$conference->seo_desc
]); 
$this->registerMetaTag([ 
    'name'=>'keywords', 
    'content'=>$conference->seo_keys
]);
$imgPath=Yii::$app->params['imgPath'];
?>

<?= $this->render("conference-partials/_head_info", ["conference" => $conference])?>

<?= $this->render("conference-partials/_info", ["conference" => $conference])?>


<?= $this->render("conference-partials/_reviews", [
    "conference" => $conference,
    "comments" => $comments,
    "sort" => $sort,
    "sort_desc" => $sort_desc,
    "alias" => $alias,
    "fbhref" => $fbhref,
    "vkhref" => $vkhref
]) ?>

<?= \frontend\components\SocialNewsWidget::widget(
    [
        "entity" => $conference,
        "vk_wall" => $wall,
        "fb_wall" => $fb_wall,
        "cache_duration" => $wall_cach
    ]);
?>

<?= $this->render("/alerts/_auth_alert")?>


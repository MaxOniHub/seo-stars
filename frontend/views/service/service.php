<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;
use common\models\Review;
use yii\widgets\Pjax;
use yii\web\View;
$this->title = $service->seo_title;
$this->registerMetaTag([ 
    'name'=>'description', 
    'content'=>$service->seo_desc
]); 
$this->registerMetaTag([ 
    'name'=>'keywords', 
    'content'=>$service->seo_keys
]);

?>
<?= $this->render("service-partials/_head_info", ["service" => $service])?>

<?= $this->render("service-partials/_info", ["service" => $service])?>


<?= $this->render("service-partials/_reviews", [
    "service" => $service,
    "comments" => $comments,
    "sort" => $sort,
    "sort_desc" => $sort_desc,
    "alias" => $alias,
    "fbhref" => $fbhref,
    "vkhref" => $vkhref
]) ?>

<?= \frontend\components\SocialNewsWidget::widget(
    [
        "entity" => $service,
        "vk_wall" => $wall,
        "fb_wall" => $fb_wall,
        "cache_duration" => $wall_cach
    ]);
?>

<?= $this->render("/alerts/_auth_alert")?>


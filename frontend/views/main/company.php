<?php;

\frontend\assets\ProfileAsset::register($this);
$this->title = $company->seo_title;
$this->registerMetaTag([
    'name'=>'description',
    'content'=>$company->seo_desc
]);
$this->registerMetaTag([
    'name'=>'keywords',
    'content'=>$company->seo_keys
]);
$imgPath=Yii::$app->params['imgPath'];
?>


<div class="row middle-xs center-xs start-md">
    <div class="col-xs-12 col-md-6 align-left md-align-center">
        <div class="section-title large pink-lined"><?= $company["name"]; ?></div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="company-logo">
            <div class="image-contain">
              <?= \yii\helpers\Html::img($imgPath.$company["logo"], ["alt" => $company["name"]])?>
            </div>
        </div>
    </div>
</div>


<?= $this->render("company-partials/_info", ["company" => $company])?>

<div class="section-subtitle small top-offset-larger bottom-offset align-left md-align-center">Специализация</div>
<?= \frontend\components\PopularActivityDirectionsWidget::widget(["items" => $company["activities"]])?>

<?php if (!empty($company["clients"])):?>
    <div class="section-subtitle small top-offset bottom-offset align-left md-align-center">Среди клиентов компании</div>
    <?= \frontend\components\CompanyClientsWidget::widget(["items" => $company["clients"]])?>
<?php endif; ?>

<?php if (!empty($company["casesFiles"])):?>
    <div class="section-subtitle small top-offset bottom-offset align-left md-align-center">Кейсы</div>
    <?= \frontend\components\CompanyImageCarouselWidget::widget(["items" => $company["casesFiles"]])?>
<?php endif; ?>

<?php if (!empty($company["reviewsAndThanksFiles"])):?>
    <div class="section-subtitle small top-offset bottom-offset align-left md-align-center">Отзывы и благодарности клиентов</div>
    <?= \frontend\components\CompanyImageCarouselWidget::widget(["items" => $company["reviewsAndThanksFiles"]])?>
<?php endif; ?>

<?php if (!empty($company["about"])):?>
    <div class="section-subtitle small top-offset align-left md-align-center">О компании</div>
    <div class="paragraph vertical-offset align-left md-align-center">
        <?= $company["about"]?>
    </div>
<?php endif; ?>

<?= $this->render("company-partials/_reviews", [
        "model" => $model,
        "company" => $company,
        "comments" => $comments,
        "sort" => $sort,
        "sort_desc" => $sort_desc,
        "alias" => $alias,
        "fbhref" => $fbhref,
        "vkhref" => $vkhref
]) ?>

<?= \frontend\components\CompanySocialNewsWidget::widget(
    [
        "company" => $company,
        "vk_wall" => $wall,
        "fb_wall" => $fb_wall,
        "cache_duration" => $wall_cach
    ]);
?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ошибка</h4>
      </div>
      <div class="modal-body">
        <p style="text-align: center;">Что бы оценить отзыв, нужно авторизоваться</p>
      </div>
    </div>
  </div>
</div>
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
?>

<?= $this->render("company-partials/_head_info", ["company" => $company])?>

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

<?= $this->render("company-partials/_about", ["company" => $company]) ?>

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

<?= \frontend\components\SocialNewsWidget::widget(
    [
        "entity" => $company,
        "vk_wall" => $wall,
        "fb_wall" => $fb_wall,
        "cache_duration" => $wall_cach
    ]);
?>

<?= $this->render("/alerts/_auth_alert")?>
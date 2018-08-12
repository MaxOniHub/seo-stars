<?php
$this->title = $page->seo_title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $page->seo_desc
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $page->seo_keys
]);

?>
<div class="align-center">
    <div class="section-title blue-lined bottom-offset"><?= $page->h1; ?></div>
    <div class="preview-text"><?= $page->preview_text?></div>
</div>

<?php if ($success_request): ?>
<div class="success-request">
    <h1 style="text-align: center; margin: 20px">Спасибо, Ваша заявка принята</h1>
</div>

<?php else: ?>
<?= $this->render('_form', ['model' => $model]); ?>
<?php endif; ?>

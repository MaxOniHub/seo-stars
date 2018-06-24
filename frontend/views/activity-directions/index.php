<div class="align-center">
    <div class="section-title blue-lined bottom-offset"><?= $activity->getTitle(); ?></div>
</div>

<!--Компании работающие в этом направлянии деятельности-->

<?=
    \frontend\components\FullCompaniesRatingWidget::widget(["items" => $items])
?>

<?php $value = $widget->getValue(); ?>

<div class="progress">
    <div class="progress-bar <?= $widget->getBarColorClass() ?>" role="progressbar" style="width: <?= $value ?>%" aria-valuenow="<?= $value ?>" aria-valuemin="0" aria-valuemax="100">
        <?= $widget->getCaption() ?>
    </div>
</div>
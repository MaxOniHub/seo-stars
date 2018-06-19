<div class="progress">
    <div class="progress-bar <?= $percents <= 60 ? "progress-bar-warning" : "progress-bar-success"?>" role="progressbar" style="width: <?= $percents ?>%" aria-valuenow="<?= $percents ?>" aria-valuemin="0" aria-valuemax="100">
        <?= $caption?>&nbsp;(<?= $percents ?>%)
    </div>
</div>
<?php

\frontend\assets\OwlCarouselAsset::register($this)
?>

<div class="image-carousel owl-carousel owl-loaded owl-drag">
    <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(-1333px, 0px, 0px); transition: 0.25s; width: 2934px;">
            <?php foreach ($items as $item): ?>
                <div class="owl-item active" style="width: 216.667px; margin-right: 50px;">
                    <a href="<?= \yii\helpers\Url::to($item->origin_path); ?>" class="item">
                        <div class="image-cover">
                            <img src="<?= \yii\helpers\Url::to($item->thumbnail_path); ?>" alt="Case">
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="owl-nav">
        <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button>
        <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
    </div>
    <div class="owl-dots">
        <button role="button" class="owl-dot active"><span></span></button>
        <button role="button" class="owl-dot"><span></span></button>
    </div>
</div>
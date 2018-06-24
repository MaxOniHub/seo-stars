<?php

\frontend\assets\CarouselAssetPosEnd::register($this)
?>
<div class="row">
    <div class="col-md-12">
        <div class="carousel slide multi-item-carousel" id="<?= $id ?>">
            <div class="carousel-inner">

                <?php foreach ($items as $key => $item): ?>
                    <div class="item <?= $key == 0 ? "active" : "" ?>">
                        <div class="col-xs-4">
                            <a href="<?= \yii\helpers\Url::to($item->origin_path); ?>"  rel="lightbox">
                                <?= \yii\helpers\Html::img(\yii\helpers\Url::to("/frontend/web/" . $item->thumbnail_path), ["class" => "img-responsive"]); ?>

                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!--  Example item end -->
            </div>
            <a class="left carousel-control" href="#<?= $id ?>" data-slide="prev"><i
                        class="glyphicon glyphicon-chevron-left"></i></a>
            <a class="right carousel-control" href="#<?= $id ?>" data-slide="next"><i
                        class="glyphicon glyphicon-chevron-right"></i></a>
        </div>
    </div>
</div>

<script>
    // Instantiate the Bootstrap carousel
    $('.multi-item-carousel#<?= $id ?>').carousel({
        interval: false
    });

    // for every slide in carousel, copy the next slide's item in the slide.
    // Do the same for the next, next item.
    $('.multi-item-carousel#<?= $id ?> .item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length>0) {
            next.next().children(':first-child').clone().appendTo($(this));
        } else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
</script>

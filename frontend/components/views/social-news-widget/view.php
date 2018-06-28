<?php if($widget->vk_wall || $widget->fb_wall): ?>
    <?php if ($this->beginCache($widget->entity["id"]."wall", ['duration' => $widget->cache_duration])): ?>

        <?php if($widget->vk_wall): ?>
            <?= $this->render("_vk_wall", ["wall" => $widget->vk_wall, "entity" => $widget->entity, "widget" => $widget])?>
        <?php endif; ?>

        <?php if($widget->fb_wall):?>
            <?= $this->render("_fb_wall", ["wall" => $widget->fb_wall, "entity" => $widget->entity, "widget" => $widget])?>
        <?php endif;?>

        <?php endif; ?>
        <?php
            $this->endCache();
        ?>
<?php endif;?>
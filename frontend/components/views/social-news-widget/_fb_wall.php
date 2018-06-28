<div class="container wall">
    <div class="row">
        <h2>Новости от <?= $entity["name"]; ?></h2>
        <div class="row">
            <?php
            for ($i = 0; $i < count($wall); $i++) {
                if ($wall[$i]->message) { ?>
                    <div class="col-sm-12 col-xs-12 news-record">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <div class="wall_text">
                                    <?= $widget->parseStringToLink($wall[$i]->message); ?>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <?= $widget->getDateByFormat(strtotime($wall[$i]->created_time)); ?>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</div>


<div class="container wall">
    <div class="row">
        <h2>Новости от <?= $entity["name"]; ?></h2>
        <?php
        for ($i = 1; $i < count($wall); $i++) {
            ?>
            <div class="col-sm-12 col-xs-12 news-record">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="wall_text">
                            <?= $widget->parseStringToLink($wall[$i]->text); ?>
                        </div>
                        <div class="row photos">
                            <?php
                            $imgs = $wall[$i]->attachments;
                            $arr = [];
                            for ($j = 0; $j < count($imgs); $j++) {
                                if ($imgs[$j]->photo->src) $arr[] = '<img src="' . $imgs[$j]->photo->src_big . '" alt="' . $i . $j . '"/>';
                            }
                            $col = count($arr);
                            if ($col >= 4) $col = 3; else if ($col == 1) $col = 12; else if ($col == 3) $col = 4; else if ($col == 2) $col = 6;
                            for ($j = 0; $j < count($arr); $j++) {
                                ?>
                                <div class="col-md-<?= $col; ?>">
                                    <?= $arr[$j]; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <?= $widget->getDateByFormat($wall[$i]->date) ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Theme */

$this->title = "Настройки+СЕО";
?>
<div class="theme-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'logo_big',
            [
                'attribute'=>'logo_big',
                'value'=>Yii::$app->params['imgPath'].$model->logo_big,
                'format' => ['image',['width'=>'90px']],
            ],
            //'logo_small',
            [
                'attribute'=>'logo_small',
                'value'=>Yii::$app->params['imgPath'].$model->logo_small,
                'format' => ['image',['width'=>'90px']],
            ],
            'metrics',
            'main_text:ntext',
            'main_title:ntext',
            'main_keys:ntext',
            'main_desc:ntext',
            'wall_cach',
            'raiting_h1',
            'raiting_title:ntext',
            'raiting_keys:ntext',
            'raiting_desc:ntext',
            'map_h1',
            'map_title:ntext',
            'map_keys:ntext',
            'map_desc:ntext',
            'about_text:ntext',
            'about_title:ntext',
            'about_keys:ntext',
            'about_desc:ntext',
            'contact_us_title:ntext',
            'contact_us_keys:ntext',
            'contact_us_desc:ntext',
            'contact_us:ntext',
            'footer_links:ntext',
            'footer_links2:ntext',
            'service_h1','service_title','service_keys','service_desc','person_h1','person_tilte','person_keys','person_desc','conference_h1','conference_title','conference_keys','conference_desc'
        ],
    ]) ?>

</div>

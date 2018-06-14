<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Mainpage */

$this->title = "Таблицы на главной";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainpage-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
    <?php 
        $arr_sort=['raiting'=>'Рейтинг','reviews'=>'Отзывы','raiting_bad'=>'Рейтинг (худшие - лучшие)','reviews_bad'=>'Отзывы (от меншего к большему)'];
        
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'title1',
            'regions1:ntext',
            'tags1:ntext',
            'limit1',
            //'sort1',
            [
                'attribute'=>'sort1',
                'value'=>$arr_sort[$model->sort1]
            ],
            'title2',
            'regions2:ntext',
            'tags2:ntext',
            'limit2',
            //'sort2',
            [
                'attribute'=>'sort2',
                'value'=>$arr_sort[$model->sort2]
            ],
            'title3',
            'regions3:ntext',
            'tags3:ntext',
            'limit3',
            //'sort3',
            [
                'attribute'=>'sort3',
                'value'=>$arr_sort[$model->sort3]
            ],
            'title4',
            'regions4:ntext',
            'tags4:ntext',
            'limit4',
            //'sort4',
            [
                'attribute'=>'sort4',
                'value'=>$arr_sort[$model->sort4]
            ],
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-view">


    <p>
        <?= Html::a('Рeдактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверенны, что хотите удалить страницу?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php 
        $arr_pos=['top'=>'Перед таблицей','bottom'=>'После таблицы'];
        $arr_sort=['raiting'=>'Рейтинг','reviews'=>'Отзывы','raiting_bad'=>'Рейтинг (худшие - лучшие)','reviews_bad'=>'Отзывы (от меншего к большему)'];
        
    ?>
    <?php if ($model->add_table==1) echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'h1',
            'alias',
            'preview_text:ntext',
            'h2',
            'seo_title',
            'seo_keys:ntext',
            'seo_desc:ntext',
            'editor:ntext',
            //'editor_pos',
            [
                'attribute'=>'editor_pos',
                'value'=>$arr_pos[$model->editor_pos]
            ],
            'regions:ntext',
            'tags:ntext',
            'limit_rec',
            //'sort_by',
            [
                'attribute'=>'sort_by',
                'value'=>$arr_sort[$model->sort_by]
            ],
        ],
    ]); else if (!$model->add_table) echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'h1',
            'alias',
            'preview_text:ntext',
            'h2',
            'seo_title',
            'seo_keys:ntext',
            'seo_desc:ntext',
            'editor:ntext',
        ],
    ])?>

</div>

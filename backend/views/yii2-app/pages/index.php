<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Страницы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать страницу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\ActionColumn'],
            //'id',
            'h1',
            'alias',
            'preview_text:ntext',
            //'h2',
            // 'seo_title',
            // 'seo_keys:ntext',
            // 'seo_desc:ntext',
            // 'editor:ntext',
            // 'editor_pos',
            // 'regions:ntext',
            // 'tags:ntext',
            // 'limit_rec',
            // 'sort_by',

        ],
    ]); ?>
</div>

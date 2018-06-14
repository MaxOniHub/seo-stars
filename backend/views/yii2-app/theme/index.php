<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ThemeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Themes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="theme-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Theme', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'logo_big',
            'logo_small',
            'main_text:ntext',
            'main_title:ntext',
            // 'main_keys:ntext',
            // 'main_desc:ntext',
            // 'raiting_h1',
            // 'raiting_title:ntext',
            // 'raiting_keys:ntext',
            // 'raiting_desc:ntext',
            // 'about_text:ntext',
            // 'about_title:ntext',
            // 'about_keys:ntext',
            // 'about_desc:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

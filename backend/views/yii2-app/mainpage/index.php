<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MainpageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mainpages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainpage-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mainpage', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title1',
            'regions1:ntext',
            'tags1:ntext',
            'limit1',
            // 'sort1',
            // 'title2',
            // 'regions2:ntext',
            // 'tags2:ntext',
            // 'limit2',
            // 'sort2',
            // 'title3',
            // 'regions3:ntext',
            // 'tags3:ntext',
            // 'limit3',
            // 'sort3',
            // 'title4',
            // 'regions4:ntext',
            // 'tags4:ntext',
            // 'limit4',
            // 'sort4',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

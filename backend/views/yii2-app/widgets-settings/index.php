<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ActivityDirectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Настройки виджетов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-direction-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'key',
            'title',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ActivityDirectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Направление деятельности';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-direction-index">

    <p>
        <?= Html::a('добавить направление деятельности', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('назначить для вывода на главной', ['ready-to-view'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'alias',
            'hex_border_color',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

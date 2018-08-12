<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RequestServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-direction-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'email',
            'country_code',
            'phone',
            'description',
            'ip',
            'created_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',

            ],
        ],


    ]); ?>
</div>

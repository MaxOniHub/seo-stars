<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use common\models\Company;
use common\models\Conference;
use common\models\Service;
use common\models\Person;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{delete}{link}',
            ],
            //'id',
            //'user_id',
            [
                'attribute'=>'user_id',
                'filter'=>User::find()->select(['name','id'])->where(['!=', 'username', 'admin'])->indexBy('id')->column(),
                'value'=>'user.name'
            ],
            //'company_id',
            [
                'attribute'=>'company_id',
                'filter'=>Company::find()->select(['name','id'])->indexBy('id')->column(),
                'value'=>'company.name'
            ],
            [
                'attribute'=>'person_id',
                'filter'=>Person::find()->select(['name','id'])->indexBy('id')->column(),
                'value'=>'person.name'
            ],
            [
                'attribute'=>'service_id',
                'filter'=>Service::find()->select(['name','id'])->indexBy('id')->column(),
                'value'=>'service.name'
            ],
                        [
                'attribute'=>'conference_id',
                'filter'=>Conference::find()->select(['name','id'])->indexBy('id')->column(),
                'value'=>'conference.name'
            ],
            'stars',
            'text:ntext',
            // 'date',
            // 'raiting',
            // 'likes',
            // 'user_ids_like:ntext',
            // 'user_ids_dislike:ntext',

            
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ConferenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Конференции';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conference-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить Конферецию', ['create'], ['class' => 'btn btn-success']) ?> <?= Html::a('Загрузить из файла', ['load'], ['class' => 'btn btn-primary']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\ActionColumn'],
            //'id',
            'name',
            'alias',
            [
                'attribute' => 'person_id',
                'value' => 'person.name'
            ],
            [
                'attribute' => 'company_id',
                'value' => 'company.name'
            ],
            // 'site',
            // 'site_link',
            // 'raiting',
            // 'reviews',
            // 'vk_group',
            // 'fb_group',
            // 'tags:ntext',
            // 'logo',
            // 'about:ntext',
            // 'seo_title',
            // 'seo_keys:ntext',
            // 'seo_desc:ntext',


        ],
    ]); ?>
<?php Pjax::end(); ?></div>

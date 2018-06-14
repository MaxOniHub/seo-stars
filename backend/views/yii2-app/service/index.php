<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сервисы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить Сервис', ['create'], ['class' => 'btn btn-success']) ?> <?= Html::a('Загрузить из файла', ['load'], ['class' => 'btn btn-primary']) ?>
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
            'site',
            //'site_link',
            // 'raiting',
            // 'reviews',
             'vk_group',
             'fb_group',
            // 'tags:ntext',
            // 'logo',
            // 'about:ntext',
            // 'email:email',
            // 'tel',
            // 'seo_title',
            // 'seo_keys:ntext',
            // 'seo_desc:ntext',


        ],
    ]); ?>
<?php Pjax::end(); ?></div>

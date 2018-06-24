<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Компании';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить компанию', ['create'], ['class' => 'btn btn-success']) ?> <?= Html::a('Загрузить из файла', ['load'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?php $ProfileCompletionColor = new \common\helpers\ProfileCompletionColor(); ?>
    <?php Pjax::begin();
    try { ?>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                ['class' => 'yii\grid\ActionColumn'],
                //'id',
                'name',
                'alias',
                [
                    'attribute' => 'site',
                    'content' => function ($model) {
                        return Html::a($model->site, $model->site, ["target" => "_blank"]);
                    }
                ],
                'raiting',
                'reviews',
                [
                    'attribute' => 'profile_complete_status',
                    'content' => function ($model) use ($ProfileCompletionColor) {
                        return "<p class='text-center' style='background-color:" . $ProfileCompletionColor->getColor($model->profile_complete_status) . ";'> 
                                    <span class='btn btn-info'>" . $model->profile_complete_status . " </span>
                                </p>";
                    }
                ],
                // 'vk_group',
                // 'fb_group',
                // 'regions:ntext',
                // 'year',
                // 'tags:ntext',
                // 'logo',
                // 'about:ntext',
                // 'email:email',
                // 'tel',


            ],
        ]);
    } catch (Exception $e) {
    } ?>
    <?php Pjax::end(); ?></div>

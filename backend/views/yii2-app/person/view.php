<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Person */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Персоны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'alias',
            [
                'attribute' => 'company_id',
                'value' => $model->company->name
            ],
            [
                'attribute' => 'service_id',
                'value' => $model->service->name
            ],
            'raiting',
            'reviews',
            'vk_group',
            'fb_group',
            'tags:ntext',
            'logo',
            'about:ntext',
            'seo_title',
            'seo_keys:ntext',
            'seo_desc:ntext',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Conference */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Конференции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conference-view">

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
                'attribute' => 'person_id',
                'value' => $model->person->name
            ],
            [
                'attribute' => 'company_id',
                'value' => $model->company->name
            ],
            'regions:ntext',
            'site',
            'site_link',
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

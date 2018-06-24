<?php

/* @var $this yii\web\View */


/* @var $model common\models\ActivityDirection */

$this->title = 'Редактировать настройки виджета: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Настройки виджетов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['update', 'id' => $model->key]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="activity-direction-update">

    <?= $this->render($view, [
        'model' => $model,
    ]) ?>

</div>


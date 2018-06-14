<?php

/* @var $this yii\web\View */


/* @var $model common\models\ActivityDirection */

$this->title = 'Редактировать Направление деательности: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Направление деательности', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="activity-direction-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


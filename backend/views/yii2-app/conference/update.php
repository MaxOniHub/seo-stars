<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Conference */

$this->title = 'Редактировать конференцию: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Конференции', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="conference-update">

    <?= $this->render('_form', [
        'model' => $model,
        'entityForm' => $entityForm,
    ]) ?>

</div>

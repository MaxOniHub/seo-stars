<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Person */

$this->title = 'Редактировать персону: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Персоны', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="person-update">

    <?= $this->render('_form', [
        'model' => $model,
        'entityForm' => $entityForm,
    ]) ?>

</div>

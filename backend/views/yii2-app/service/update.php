<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Service */

$this->title = 'Редактировать Сервис: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Сервисы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="service-update">

    <?= $this->render('_form', [
        'model' => $model,
        'entityForm' => $entityForm
    ]) ?>

</div>

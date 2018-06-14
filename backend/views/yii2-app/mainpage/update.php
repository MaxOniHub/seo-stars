<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mainpage */

$this->title = 'Редактировать таблицы на главной: ';
$this->params['breadcrumbs'][] = ['label' => 'Таблицы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="mainpage-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

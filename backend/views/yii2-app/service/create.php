<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Service */

$this->title = 'Добавить Сервис';
$this->params['breadcrumbs'][] = ['label' => 'Сервисы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-create">

    <?= $this->render('_form', [
        'model' => $model,
        'entityForm' => $entityForm
    ]) ?>

</div>

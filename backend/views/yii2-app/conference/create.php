<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Conference */

$this->title = 'Добавить конференцию';
$this->params['breadcrumbs'][] = ['label' => 'Конференции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conference-create">

    <?= $this->render('_form', [
        'model' => $model,
        'entityForm' => $entityForm
    ]) ?>

</div>

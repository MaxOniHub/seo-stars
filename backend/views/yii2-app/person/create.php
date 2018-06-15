<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Person */

$this->title = 'Добавить Персону';
$this->params['breadcrumbs'][] = ['label' => 'Персоны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-create">

    <?= $this->render('_form', [
        'model' => $model,
        'entityForm' => $entityForm,
    ]) ?>

</div>

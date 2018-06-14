<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Theme */

$this->title = 'Редактировать настройки';
?>
<div class="theme-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

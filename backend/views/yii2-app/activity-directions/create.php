<?php

/* @var $this yii\web\View */
/* @var $model common\models\ActivityDirection */

$this->title = 'Добавить направление деятельности';
$this->params['breadcrumbs'][] = ['label' => 'Направление деятельности', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-direction-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

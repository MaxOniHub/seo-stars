<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MainpageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mainpage-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title1') ?>

    <?= $form->field($model, 'regions1') ?>

    <?= $form->field($model, 'tags1') ?>

    <?= $form->field($model, 'limit1') ?>

    <?php // echo $form->field($model, 'sort1') ?>

    <?php // echo $form->field($model, 'title2') ?>

    <?php // echo $form->field($model, 'regions2') ?>

    <?php // echo $form->field($model, 'tags2') ?>

    <?php // echo $form->field($model, 'limit2') ?>

    <?php // echo $form->field($model, 'sort2') ?>

    <?php // echo $form->field($model, 'title3') ?>

    <?php // echo $form->field($model, 'regions3') ?>

    <?php // echo $form->field($model, 'tags3') ?>

    <?php // echo $form->field($model, 'limit3') ?>

    <?php // echo $form->field($model, 'sort3') ?>

    <?php // echo $form->field($model, 'title4') ?>

    <?php // echo $form->field($model, 'regions4') ?>

    <?php // echo $form->field($model, 'tags4') ?>

    <?php // echo $form->field($model, 'limit4') ?>

    <?php // echo $form->field($model, 'sort4') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

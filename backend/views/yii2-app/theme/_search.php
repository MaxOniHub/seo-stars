<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ThemeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="theme-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'logo_big') ?>

    <?= $form->field($model, 'logo_small') ?>

    <?= $form->field($model, 'main_text') ?>

    <?= $form->field($model, 'main_title') ?>

    <?php // echo $form->field($model, 'main_keys') ?>

    <?php // echo $form->field($model, 'main_desc') ?>

    <?php // echo $form->field($model, 'raiting_h1') ?>

    <?php // echo $form->field($model, 'raiting_title') ?>

    <?php // echo $form->field($model, 'raiting_keys') ?>

    <?php // echo $form->field($model, 'raiting_desc') ?>

    <?php // echo $form->field($model, 'about_text') ?>

    <?php // echo $form->field($model, 'about_title') ?>

    <?php // echo $form->field($model, 'about_keys') ?>

    <?php // echo $form->field($model, 'about_desc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

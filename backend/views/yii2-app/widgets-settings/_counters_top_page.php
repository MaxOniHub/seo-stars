<?php

use yii\helpers\Url;
use kartik\color\ColorInput;
use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ActivityDirection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-direction-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput() ?>
        </div>

    </div>
    <div class="row">

        <div class="col-md-3">
            <?= $form->field($model, 'first_title')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'first_counter')->textInput(); ?>
        </div>

    </div>

    <div class="row">

        <div class="col-md-3">
            <?= $form->field($model, 'second_title')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'second_counter')->textInput(); ?>
        </div>

    </div>

    <div class="row">

        <div class="col-md-3">
            <?= $form->field($model, 'third_title')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'third_counter')->textInput(); ?>
        </div>

    </div>


    <div class="form-group">
        <?= Html::submitButton('Редактировать', ['class' =>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


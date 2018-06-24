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
            <?= $form->field($model, 'region_name1')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'region_link1')->textInput(); ?>
        </div>

    </div>

    <div class="row">

        <div class="col-md-3">
            <?= $form->field($model, 'region_name2')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'region_link2')->textInput(); ?>
        </div>

    </div>
    <div class="row">

        <div class="col-md-3">
            <?= $form->field($model, 'region_name3')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'region_link3')->textInput(); ?>
        </div>

    </div>

    <div class="row">

        <div class="col-md-3">
            <?= $form->field($model, 'region_name4')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'region_link4')->textInput(); ?>
        </div>

    </div>

    <div class="row">

        <div class="col-md-3">
            <?= $form->field($model, 'region_name5')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'region_link5')->textInput(); ?>
        </div>

    </div>
    <div class="form-group">
        <?= Html::submitButton('Редактировать', ['class' =>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


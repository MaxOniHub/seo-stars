<?php

use dosamigos\ckeditor\CKEditor;
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

        <div class="col-md-3">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'h1_title')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'alias')->textInput() ?>
        </div>

    </div>
    <div class="row">

        <div class="col-md-3">
            <?= $form->field($model, 'hex_border_color')->widget(ColorInput::classname(), [
                'options' => ['placeholder' => 'Select color ...'],]);
            ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'is_visible')->widget(SwitchInput::classname(), []); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'about')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full'
            ]) ?>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'seo_title')->textInput() ?>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'seo_keys')->textInput() ?>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'seo_desc')->textarea() ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>

    <?php
    $url2 = Url::toRoute(["/slug-translator/get-slug"]);
    ?>
    <script>

        $('#activitydirection-title').change(function () {
            var name = $(this).val();
            $.get("<?= $url2 ?>", {slug: name}, function (data) {
                data = $.parseJSON(data);
                $('#activitydirection-alias').attr("value", data.alias);
            });
        });
    </script>
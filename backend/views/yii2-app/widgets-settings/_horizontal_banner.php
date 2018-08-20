<?php

use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\ActivityDirection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-direction-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-6">

            <div class="row">

                <div class="col-md-12">
                    <?= $form->field($model, 'title')->textInput() ?>
                </div>

            </div>
            <div class="row">

                <div class="col-md-6">
                    <?= $form->field($model, 'height')->textInput(['id' => 'height']) ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'width')->textInput(['id' => 'width']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'target')->widget(SwitchInput::classname(), ['pluginOptions' => [
                        'onText' => 'Да',
                        'offText' => 'Нет',
                    ]]); ?>
                </div>
                <div class="col-md-6">

                    <?= $form->field($model, 'is_disabled')->widget(SwitchInput::classname(), ['pluginOptions' => [
                        'onText' => 'Да',
                        'offText' => 'Нет',
                    ]]); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'url')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'file_path')->textInput(['id' => 'file_path', 'readonly'=> true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    echo FileInput::widget([
                        'name' => 'file',
                        'options' => [
                            'multiple' => false
                        ],
                        'pluginOptions' => [
                            'uploadUrl' => Url::to(['/widgets-settings/upload-media']),
                            'uploadExtraData' => [
                                'key' => $model->key,
                            ],
                            'maxFileCount' => 10
                        ],
                        'pluginEvents' => [
                            'fileuploaded' => 'function(event, file, previewId, index) { 
                            $("#file_path").val(file.response.path);
                            $("#width").val(file.response.width);
                            $("#height").val(file.response.height);
                        }',
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <?php if ($model->file_path): ?>
                        <?= Html::img($model->file_path, ['class' => 'img-rounded', 'width' => '75%']); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-bottom: 50px"></div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= Html::submitButton('Редактировать', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

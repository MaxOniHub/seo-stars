<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor; 
/* @var $this yii\web\View */
/* @var $model common\models\Theme */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="theme-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->logo_big){echo "<img style='width:100px;' src='".Yii::$app->params['imgPath'].$model->logo_big."' alt='ph' />";}?>
    <?= $form->field($model, 'logo_big')->fileInput() ?>

    <?php if($model->logo_small){echo "<img style='width:100px;' src='".Yii::$app->params['imgPath'].$model->logo_small."' alt='ph' />";}?>
    <?= $form->field($model, 'logo_small')->fileInput() ?>
    
    <?= $form->field($model, 'metrics')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'main_text')->textarea(['rows' => 6])->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
        ]) ?>
    
    <?= $form->field($model, 'main_title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'main_keys')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'main_desc')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'wall_cach')->dropDownList(['60'=>'Online','86400'=>'Ежедневно','259200'=>'Раз в 3 дня','604800'=>'Раз в неделю', '1209600'=>'Раз в 2 недели']) ?>
    

    <?= $form->field($model, 'raiting_h1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'raiting_title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'raiting_keys')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'raiting_desc')->textarea(['rows' => 6]) ?>
    
    
    <?= $form->field($model, 'service_h1')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'service_title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'service_keys')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'service_desc')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'person_h1')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'person_tilte')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'person_keys')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'person_desc')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'conference_h1')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'conference_title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'conference_keys')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'conference_desc')->textarea(['rows' => 6]) ?>
    
    
    <?= $form->field($model, 'map_h1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'map_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'map_keys')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'map_desc')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'about_text')->textarea(['rows' => 6])->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
        ]) ?>

    <?= $form->field($model, 'about_title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'about_keys')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'about_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'contact_us_title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'contact_us_keys')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'contact_us_desc')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'contact_us')->textarea(['rows' => 6])->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
        ]) ?>
    <?= $form->field($model, 'footer_links')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'footer_links2')->textarea(['rows' => 6]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

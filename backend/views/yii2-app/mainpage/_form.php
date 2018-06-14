<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Url;
use kartik\select2\Select2;
use common\models\Tag;
use common\models\Region;

/* @var $this yii\web\View */
/* @var $model common\models\Mainpage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mainpage-form">

    <?php $form = ActiveForm::begin(); ?>
    <h2>Таблица 1</h2>
    <?= $form->field($model, 'title1')->textInput(['maxlength' => true]) ?>

    <?php $regs = Region::find()->select(['name'])->indexBy('name')->column();?>
    <?= $form->field($model, 'regions1')->widget(Select2::className(), [
        'data' => $regs,
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'любой регион', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
        ],])  
    ?>

    <?php $tags = Tag::find()->select(['name'])->indexBy('name')->column();?>
    <?= $form->field($model, 'tags1')->widget(Select2::className(), [
        'data' => $tags,
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'любой тег', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
        ],
        ])  
    ?>

    <?= $form->field($model, 'limit1')->textInput() ?>

    <?= $form->field($model, 'sort1')->dropDownList(['raiting'=>'Рейтинг','reviews'=>'Отзывы','raiting_bad'=>'Рейтинг (худшие - лучшие)','reviews_bad'=>'Отзывы (от меншего к большему)']) ?>
    
    <h2>Таблица 2</h2>        

    <?= $form->field($model, 'title2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'regions2')->widget(Select2::className(), [
        'data' => $regs,
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'любой регион', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
        ],])  
    ?>

    <?= $form->field($model, 'tags2')->widget(Select2::className(), [
        'data' => $tags,
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'любой тег', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
        ],
        ])  
    ?>

    <?= $form->field($model, 'limit2')->textInput() ?>

    <?= $form->field($model, 'sort2')->dropDownList(['raiting'=>'Рейтинг','reviews'=>'Отзывы','raiting_bad'=>'Рейтинг (худшие - лучшие)','reviews_bad'=>'Отзывы (от меншего к большему)']) ?>
    
    <h2>Таблица 3</h2>        
    
    <?= $form->field($model, 'title3')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'regions3')->widget(Select2::className(), [
        'data' => $regs,
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'любой регион', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
        ],])  
    ?>
    <?= $form->field($model, 'tags3')->widget(Select2::className(), [
        'data' => $tags,
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'любой тег', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
        ],
        ])  
    ?>


    <?= $form->field($model, 'limit3')->textInput() ?>

    <?= $form->field($model, 'sort3')->dropDownList(['raiting'=>'Рейтинг','reviews'=>'Отзывы','raiting_bad'=>'Рейтинг (худшие - лучшие)','reviews_bad'=>'Отзывы (от меншего к большему)']) ?>
    
    <h2>Таблица 4</h2>        

    <?= $form->field($model, 'title4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'regions4')->widget(Select2::className(), [
        'data' => $regs,
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'любой регион', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
        ],])  
    ?>

    <?= $form->field($model, 'tags4')->widget(Select2::className(), [
        'data' => $tags,
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'любой тег', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
        ],
        ])  
    ?>

    <?= $form->field($model, 'limit4')->textInput() ?>

    <?= $form->field($model, 'sort4')->dropDownList(['raiting'=>'Рейтинг','reviews'=>'Отзывы','raiting_bad'=>'Рейтинг (худшие - лучшие)','reviews_bad'=>'Отзывы (от меншего к большему)']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

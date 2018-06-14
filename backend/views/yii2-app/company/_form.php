<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Url;
use kartik\select2\Select2;
use common\models\Tag;
use common\models\Region;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'site_link')->dropDownList([0=>'Нет',1=>'Да']) ?>
    <?= $form->field($model, 'videos')->textArea(['rows'=>4]) ?>

    <?php //$form->field($model, 'raiting')->textInput() ?>

    <?php //$form->field($model, 'reviews')->textInput() ?>

    <?= $form->field($model, 'vk_group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fb_group')->textInput(['maxlength' => true]) ?>
    
    <?php $regs = Region::find()->select(['name'])->indexBy('name')->column();?>
    <?= $form->field($model, 'regions')->widget(Select2::className(), [
    'data' => $regs,
    'size' => Select2::MEDIUM,
    'options' => ['placeholder' => 'Выберите регион...', 'multiple' => true],
    'pluginOptions' => [
        'allowClear' => true,
    ],
    ])   ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>
    
    <?php $tags = Tag::find()->select(['name'])->indexBy('name')->column();?>
    <?= $form->field($model, 'tags')->widget(Select2::className(), [
    'data' => $tags,
    'size' => Select2::MEDIUM,
    'options' => ['placeholder' => 'Выберите тег...', 'multiple' => true],
    'pluginOptions' => [
        'allowClear' => true,
    ],
    ])  
    ?>
    
    <?php if($model->logo){echo "<img style='width:100px;' src='".Yii::$app->params['imgPath'].$model->logo."' alt='logo' />";}?>
    <?= $form->field($model, 'logo')->fileInput() ?>

    <?= $form->field($model, 'about')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
        ])   ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'seo_keys')->textInput(['maxlength' => true]) ?>
        
    <?= $form->field($model, 'seo_desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$url2=Url::toRoute(["company/nameurl"]);
$script = <<< JS
    $('#company-name').change(function(){
       var name=$(this).val();
      $.get('$url2', {name : name}, function(data){
        var data= $.parseJSON(data);
        $('#company-alias').val(data.alias);        
       }); 
    });
JS;
$this->registerJs($script);
?>

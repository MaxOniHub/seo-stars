<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use yii\helpers\Url;
use common\models\Tag;
use common\models\Company;
use common\models\Service;

/* @var $this yii\web\View */
/* @var $model common\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activities_ids')->widget(Select2::className(), [
        'data' => \yii\helpers\ArrayHelper::map($entityForm->getActivities(), "id", "title"),
        'options' => ['placeholder' => 'Выберите направление деятельности...', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])  ?>

    <?php $company = Company::find()->select(['name', 'id'])->indexBy('id')->column();?>
    <?= $form->field($model, 'company_id')->widget(Select2::className(), [
        'data' => $company,
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'Выберите компанию...', 'multiple' => false],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])  ?>
    
    <?php $service = Service::find()->select(['name', 'id'])->indexBy('id')->column();?>
    <?= $form->field($model, 'service_id')->widget(Select2::className(), [
        'data' => $service,
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'Выберите сервис...', 'multiple' => false],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])  ?>

    <?= $form->field($model, 'vk_group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fb_group')->textInput(['maxlength' => true]) ?>

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

    <?php if($model->logo){echo "<img style='width:100px;' src='../../frontend/web/mt/img/".$model->logo."'/>";}?>
    <?= $form->field($model, 'logo')->fileInput() ?>

    <?= $form->field($model, 'about')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
        ])   ?>

    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seo_keys')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seo_desc')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$url2=Url::toRoute(["person/nameurl"]);
$script = <<< JS
    $('#person-name').change(function(){
       var name=$(this).val();
      $.get('$url2', {name : name}, function(data){
        var data= $.parseJSON(data);
        $('#person-alias').val(data.alias);        
       }); 
    });
JS;
$this->registerJs($script);
?>

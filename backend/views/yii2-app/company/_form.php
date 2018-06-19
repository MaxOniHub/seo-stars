<?php

use kartik\file\FileInput;
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

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

   <?= \frontend\components\ProfileCompleteStatusBarWidget::widget(["percents" => $model->profile_complete_status, "caption" => "Заполненность профиля"])?>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'profile_complete_status')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'raiting')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
        </div>

    </div>


    <?= $form->field($model, 'activities_ids')->widget(Select2::className(), [
        'data' => \yii\helpers\ArrayHelper::map($entityForm->getActivities(), "id", "title"),
        'options' => ['placeholder' => 'Выберите направление деятельности...', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]) ?>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'site_link')->dropDownList([0 => 'Нет', 1 => 'Да']) ?>
        </div>

    </div>


    <?= $form->field($model, 'videos')->textArea(['rows' => 4]) ?>

    <?php //$form->field($model, 'raiting')->textInput() ?>

    <?php //$form->field($model, 'reviews')->textInput() ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'clients')->textarea() ?>
            <p><i><span class="badge label-warning">!</span> Перечисление через запятую</i></p>
        </div>
    </div>

    <div class="row">

        <div class="col-md-2">
            <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-5">
            <?= $form->field($model, 'vk_group')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'fb_group')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <div class="row">

        <div class="col-md-5">
            <?php $regs = Region::find()->select(['name'])->indexBy('name')->column(); ?>

            <?= $form->field($model, 'regions')->widget(Select2::className(), [
                'data' => $regs,
                'size' => Select2::MEDIUM,
                'options' => ['placeholder' => 'Выберите регион...', 'multiple' => true],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]) ?>
        </div>

        <div class="col-md-7">

            <?php $tags = Tag::find()->select(['name'])->indexBy('name')->column(); ?>
            <?= $form->field($model, 'tags')->widget(Select2::className(), [
                'data' => $tags,
                'size' => Select2::MEDIUM,
                'options' => ['placeholder' => 'Выберите тег...', 'multiple' => true],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])
            ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <?=
            $form->field($model, 'logo')->widget(FileInput::classname(), [
                'options' => [
                    'accept' => 'image/*',
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6 text-center">
            <div class="form-group" style="margin-top: 20px">
                <?php if ($model->logo): ?>
                    <img src="<?= Yii::$app->params['imgPath'] . $model->logo ?>" class="img-rounded" width="200"
                         alt='logo'/>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <hr/>
    <div class="row">
        <div class="col-md-12">
            <?=
            $form->field($model, 'cases[]')->widget(FileInput::classname(), [
                'options' => [
                    'accept' => 'image/*',
                    'multiple' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-12">
            <?= \frontend\components\CompanyImageCarouselWidget::widget(["items" => $model->casesFiles, "id" => "carousel1"]) ?>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-12">

            <?=
            $form->field($model, 'reviews_and_thanks[]')->widget(FileInput::classname(), [
                'options' => [
                    'accept' => 'image/*',
                    'multiple' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-12">
            <?= \frontend\components\CompanyImageCarouselWidget::widget(["items" => $model->reviewsAndThanksFiles, "id" => "carousel2"]) ?>
        </div>
    </div>
    <hr/>

    <?= $form->field($model, 'about')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'seo_keys')->textInput(['maxlength' => true]) ?>

        </div>
    </div>


    <?= $form->field($model, 'seo_desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$url2 = Url::toRoute(["company/nameurl"]);
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

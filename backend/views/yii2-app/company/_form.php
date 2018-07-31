<?php

use kartik\file\FileInput;
use kartik\touchspin\TouchSpin;
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

    <div class="row">

        <div class="col-md-4">
            <?= \frontend\components\ProfileCompleteStatusBarWidget::widget(["percents" => $model->profile_complete_status, "caption" => "Профиль заполнен на "])?>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-3">
                    <?=
                    $form->field($model, 'raiting')->widget(TouchSpin::classname(), [
                        'options'=>['placeholder'=>'Введите рейтинг'],
                        'pluginOptions' => [
                            'verticalbuttons' => true,
                            'verticalupclass' => 'glyphicon glyphicon-plus',
                            'verticaldownclass' => 'glyphicon glyphicon-minus',
                            'max' => 99999,
                        ]
                    ]);
                    ?>
                </div>
                <div class="col-md-3">
                    <?=
                      $form->field($model, 'mod_rating')->textInput(['maxlength' => true, "disabled" => true])
                    ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'profile_complete_status')->textInput(['maxlength' => true, "disabled" => true]); ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'multiplier')->widget(TouchSpin::classname(), [
                        'options'=>['placeholder'=>'Введите мультипликатор'],
                        'pluginOptions' => [
                            'initval' => 1.00,
                            'decimals' => 2,
                            'step' => 0.1,
                            'verticalbuttons' => true,
                            'verticalupclass' => 'glyphicon glyphicon-plus',
                            'verticaldownclass' => 'glyphicon glyphicon-minus',
                        ]
                    ]);
                    ?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
           <p><i><span class="badge label-warning">?</span><code>Модифицированный рейтинг</code>будет отображаться на сайте как значение рейтинга Компании и рассчитывается по формуле</i><code>Базовый рейтинг</code>*<code>Наполенность профиля</code>*<code>Мультипликатор</code></p>
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

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'videos')->textArea(['rows' => 4]) ?>
            <i> Укажите ID видео или несколько ID через <code>`,`</code></i>
        </div>
    </div>
    <br>
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
            <?= \frontend\components\CompanyImageCarouselWidget::widget(["items" => $model->casesFiles, "id" => "carousel1", "carousel" => "bootstrap"]) ?>
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
            <?= \frontend\components\CompanyImageCarouselWidget::widget(["items" => $model->reviewsAndThanksFiles, "id" => "carousel2",  "carousel" => "bootstrap"]) ?>
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

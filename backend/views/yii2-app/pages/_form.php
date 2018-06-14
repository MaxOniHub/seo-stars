<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Url;
use kartik\select2\Select2;
use common\models\Tag;
use common\models\Region;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preview_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'h2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seo_keys')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seo_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'editor')->textarea(['rows' => 6])->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
        ]) ?>
    
    <?= $form->field($model, 'editor_pos')->dropDownList(['top'=>'Перед таблицей','bottom'=>'После таблицы']) ?>
    
    <?= $form->field($model, 'add_table')->dropDownList([0=>'Не добавлять',1=>'Добавить'],['prompt'=>'Добавить таблицу на страницу?']) ?>
    <div class="table_gen" <?php if($model->add_table!=1){?>style="display: none;" accesskey="<?php }?>">
        <h3>Генерация таблицы</h3>
        <?php $regs = Region::find()->select(['name'])->indexBy('name')->column();?>
        <?= $form->field($model, 'regions')->widget(Select2::className(), [
        'data' => $regs,
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'регион...', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
        ],
        ])   ?>
    
        <?php $tags = Tag::find()->select(['name'])->indexBy('name')->column();?>
        <?= $form->field($model, 'tags')->widget(Select2::className(), [
        'data' => $tags,
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'тег...', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
        ],
        ])  
        ?>
    
        <?= $form->field($model, 'limit_rec')->textInput() ?>
    
        <?= $form->field($model, 'sort_by')->dropDownList(['raiting'=>'Рейтинг','reviews'=>'Отзывы','raiting_bad'=>'Рейтинг (худшие - лучшие)','reviews_bad'=>'Отзывы (от меншего к большему)']) ?>

    </div>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS
    $('#pages-add_table').change(function(){
       var name=$(this).val();
       if(name==0)
            $('.table_gen').css('display', 'none'); 
       if(name==1)
            $('.table_gen').css('display', 'block'); 
    });
JS;
$this->registerJs($script);
?>
<?php
$url2=Url::toRoute(["pages/nameurl"]);
$script = <<< JS
    $('#pages-h1').change(function(){
       var name=$(this).val();
      $.get('$url2', {name : name}, function(data){
        var data= $.parseJSON(data);
        $('#pages-alias').val(data.alias);        
       }); 
    });
JS;
$this->registerJs($script);
?>

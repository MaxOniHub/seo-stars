<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;
use recaptcha\ReCaptcha;
?>

<?php $f=ActiveForm::begin(['id' => 'addcommentform',
 'options'=>['data-pjax'=>true]]);?>
    <div class="row">
        <div class="col-md-7">
            <?=$f->field($model, 'text')->textArea(['placeholder'=>'Напишите здесь Ваше мнение о компании...', 'class'=>'review_text'])->label('');?>
        </div>
        <div class="col-md-5">
            <div class="star_input row">
                <div class="col-sm-5 col-xs-5 review_mark">
                    <span>Ваша оценка:</span>
                </div>
                <div class="col-sm-7 col-xs-7">
                     <?=$f->field($model, 'star')->widget(StarRating::classname(), [
                        'pluginOptions' => [
                            'size'=>'xs',
                            'step'=>1,
                            'showClear' => false,
                            'showCaption' => false,
                        ]
                    ])->label('');?>
                </div>
            </div>
            <?php /* $f->field($model, 'reCaptcha')->widget(
                \himiklab\yii2\recaptcha\ReCaptcha::className(),
                ['siteKey' => '6Lf0PSoUAAAAAI6ae2q-pEyup8BgdQ81P9laYI_t',
                'options'=>['id'=>'reCaptchaid']]
            )->label(false) */?>
            <?= $f->field($model, 'reCaptcha')->widget(ReCaptcha::className(), [
                'id' => 'company-captcha',
                'render' => ReCaptcha::RENDER_EXPLICIT,
            ])->label(false) ?>
            <div class="rew_bott">
                <div class="review_button">
                    <?= Html::submitButton('Добавить', ['name' => 'add-button']) ?>
                </div>
            </div>
            
        </div>
    </div>
<?php ActiveForm::end();?>
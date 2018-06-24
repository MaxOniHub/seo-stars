<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['id' => 'addReview', 'options' => ['data-pjax' => true, 'class' => 'form validate-form add-review top-offset']]); ?>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <div class="title">Добавить отзыв:</div>
            <?= \yii\helpers\Html::textarea("text", '', ["class" => "textarea", "placeholder" => "Напишите здесь Ваше мнение о компании..."]) ?>

            <div class="text-error">Необходимо заполнить «Текст комментария».</div>
        </div>
    </div>
    <div class="col-xs-12 col-md-5 col-md-offset-1 ">
        <div class="form-group offset-top inline-blocks">
            <div class="title rating-title">Ваша оценка:</div>
            <?= \yii\helpers\Html::hiddenInput("star", '3', ["id" => "ratingResult"]) ?>

            <ul class="rating-edited edited" data-onchange="ratingChange" data-value="3">
                <li></li>
                <li></li>
                <li class="active"></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Добавить', ['name' => 'add-button', 'class' => 'btn top-offset']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<?/*= $f->field($model, 'reCaptcha')->widget(ReCaptcha::className(), [
    'id' => 'company-captcha',
    'render' => ReCaptcha::RENDER_EXPLICIT,
])->label(false) */?>

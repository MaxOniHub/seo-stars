<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

\frontend\assets\RequestServiceFormAsset::register($this)
?>

<?php
$form = ActiveForm::begin(['id' => 'addRequestService', 'options' => ['data-pjax' => true, 'class' => 'form validate-form add-review top-offset']]); ?>


<div class="row">
    <div class="col-md-12 request-service-form">

        <div class="row record">
            <div class="<?= $widget->getLabelColumnOffset(); ?> text-right field-label">
                <?= Html::label("Имя"); ?>
            </div>
            <div class="<?= $widget->getFieldColumnOffset(); ?>">
                <?= $form->field($widget->model, 'name')->textInput(['class' => 'form-control field'])->label(false) ?>
            </div>
        </div>

        <div class="row record">
            <div class="<?= $widget->getLabelColumnOffset(); ?> text-right field-label">
                <?= Html::label("Email"); ?>
            </div>
            <div class="<?= $widget->getFieldColumnOffset(); ?>">
                <?= $form->field($widget->model, 'email')->textInput(['class' => 'form-control field'])->label(false) ?>
            </div>
        </div>
        <div class="row record">
            <div class="<?= $widget->getLabelColumnOffset(); ?> text-right field-label">
                <?= Html::label("Телефон"); ?>
            </div>
            <div class="<?= $widget->getFieldColumnOffset(); ?>">
                <div class="row">
                    <div class="col-md-3 code">
                        <?= $form->field($widget->model, 'country_code')->dropDownList(
                            [
                                '38' => '+380',
                                '7' => '+7'],
                            ['class' => 'form-control field'])->label(false) ?>
                    </div>
                    <div class="col-md-9 phone">

                        <?= $form->field($widget->model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '9',
                            'options' => ['class' =>'form-control field'],
                            'clientOptions' => ['repeat' => 12, 'greedy' => false],
                        ])->label(false) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row record">
            <div class="<?= $widget->getLabelColumnOffset(); ?> text-right field-label">
                <?= Html::label("Сайт"); ?>
            </div>
            <div class="<?= $widget->getFieldColumnOffset(); ?>">
                <?= $form->field($widget->model, 'site')->textInput(['class' => 'form-control field'])->label(false) ?>
            </div>
        </div>
        <div class="row record">
            <div class="<?= $widget->getLabelColumnOffset(); ?> text-right field-label ">
                <?= Html::label("Подробности", null, ['class' => 'v-align-top']); ?>
            </div>
            <div class="<?= $widget->getFieldColumnOffset(); ?> form-group">
                <?= $form->field($widget->model, 'description')->textarea(['class' => 'form-control field textarea'])->label(false) ?>
            </div>
        </div>

        <div class="row record">
            <div class="<?= $widget->getLabelColumnOffset(); ?> text-right field-label">
            </div>
            <div class="<?= $widget->getFieldColumnOffset(); ?> form-group">
                <?= Html::submitButton('Отправить', ['name' => 'add-button', 'class' => 'btn top-offset submit-button', 'onClick' => "ga('send', 'event', 'zayavka', 'click');"]) ?>
            </div>
        </div>
    </div>

</div>
<?php ActiveForm::end(); ?>

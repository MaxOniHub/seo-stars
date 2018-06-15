<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ActivityDirectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Назначить для вывода на главной';
$this->params['breadcrumbs'][] = ['label' => 'Направление деательности', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Назначить для вывода на главной', 'url' => ['ready-to-view']];

?>
<div class="activity-direction-index">

<div class="row">
    <div class="col-md-6">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'activities_ids')->widget(Select2::className(), [
            'data' => \yii\helpers\ArrayHelper::map($activities, "id", "title"),
            'options' => ['placeholder' => 'Выберите направление деятельности...', 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ])  ?>

        <div class="form-group">
            <?= Html::submitButton('Назначить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>

</div>

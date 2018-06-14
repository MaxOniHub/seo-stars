<?php

/* @var $this yii\web\View */
$this->title = 'Вы вошли в админ-панель';
?>
<h2>Скачать инструкцию по пользованию можно ниже</h2>
<a href="<?=Yii::$app->params['imgPath'];?>instr.doc">инструкция</a>
<br />
<a href="<?=Yii::$app->params['imgPath'];?>file_ex.xlsx">пример заполнения exel</a>
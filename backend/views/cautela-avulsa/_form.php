<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CautelaAvulsa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cautela-avulsa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'NomeResponsavel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ValidadeCautela')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TelefoneResponsavel')->textInput() ?>

    <?= $form->field($model, 'ObservacoesDescarte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ImagemCautela')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StatusCautelaAvulsa')->dropDownList(['Em aberto' => 'Em aberto','Concluída'=> 'Concluída','Em atraso'=>'Em atraso']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gerar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

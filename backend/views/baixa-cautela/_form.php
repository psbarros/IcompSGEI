<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BaixaCautela */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="baixa-cautela-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCautela')->textInput() ?>

   

    <?= $form->field($model, 'Recebedor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DataDevolucao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Equipamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ObservacaoBaixaCautela')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dar Baixa' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

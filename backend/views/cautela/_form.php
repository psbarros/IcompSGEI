<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;
use kartik\widgets\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Cautela */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cautela-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NomeResponsavel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OrigemCautela')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DataDevolucao')->textInput(['maxlength' => true]) ?>

        <div class="row">

                <?= $form->field($model, 'Email' , ['options' => ['class' => 'col-md-3']] )->textInput(['maxlength' => true])->label("<font color='#FF0000'>*</font> <b>Email:</b>"); ?>
                
                <?= $form->field($model, 'ValidadeCautela', ['options' => ['class' => 'col-md-4']])->widget(DatePicker::classname(), [
                    'language' => 'pt-BR',
                    'options' => ['placeholder' => 'Selecione a Validade ...',],
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true
                    ]
                ])->label("<font color='#FF0000'>*</font> <b>Data da Validade:</b>")
                ?>
        </div>

    

    <div class="row">
                <?= $form->field($model, 'TelefoneResponsavel', ['options' => ['class' => 'col-md-3']])->widget(MaskedInput::className(), [
                'mask' => '(99) 99999-9999'])->label("Telefone :");?>
    </div>

    <?= $form->field($model, 'ImagemCautela')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'Equipamento')->dropDownList([ArrayHelper::map(app\models\Equipamento::find()->all(),'idEquipamento','NomeEquipamento'),['prompt'=>'Selecione um Equipamento']]) ?>

    <?= $form->field($model, 'StatusCautela')->dropDownList(['Em aberto' => 'Em aberto','Concluída'=> 'Concluída','Em atraso'=>'Em atraso']) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gerar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

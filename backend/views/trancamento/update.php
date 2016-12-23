<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trancamento */

$this->title = 'Editar - Trancamento #'.$model->id.' - Aluno: '.$model->aluno->nome;
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar Trancamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Trancamento #'.$model->id.' - Aluno: '.$model->aluno->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="trancamento-update">

    <!--h1><?= Html::encode($this->title) ?></h1-->

    <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Voltar', ['trancamento/view', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    <br><br>
    <?= $this->render('_updateForm', [
        'model' => $model,
    ]) ?>

</div>

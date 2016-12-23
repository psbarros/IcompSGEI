<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Prorrogacao */

$this->title = 'Editar - Prorrogacao #'.$model->id.' - Aluno: '.$model->aluno->nome;
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar Prorrogações', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Prorrogação #'.$model->id.' - Aluno: '.$model->aluno->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="prorrogacao-update">

    <!--h1><?= Html::encode($this->title) ?></h1-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

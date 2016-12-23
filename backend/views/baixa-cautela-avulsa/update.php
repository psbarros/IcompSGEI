<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BaixaCautelaAvulsa */

$this->title = 'Atualizar Baixa Cautela Avulsa: ' . $model->idBaixaCautelaAvulsa;
$this->params['breadcrumbs'][] = ['label' => 'Baixa Cautela Avulsas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idBaixaCautelaAvulsa, 'url' => ['view', 'id' => $model->idBaixaCautelaAvulsa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="baixa-cautela-avulsa-update">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

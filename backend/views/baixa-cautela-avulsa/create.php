<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BaixaCautelaAvulsa */

$this->title = 'Baixa Cautela Avulsa';
$this->params['breadcrumbs'][] = ['label' => 'Baixa Cautela Avulsas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="baixa-cautela-avulsa-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

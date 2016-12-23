<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BaixaCautela */

$this->title = ' Baixa Cautela';
$this->params['breadcrumbs'][] = ['label' => 'Baixa Cautelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="baixa-cautela-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

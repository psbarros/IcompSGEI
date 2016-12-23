<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BaixaCautelaAvulsa */

$this->title = $model->idBaixaCautelaAvulsa;
$this->params['breadcrumbs'][] = ['label' => 'Baixa Cautela Avulsas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="baixa-cautela-avulsa-view">


    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->idBaixaCautelaAvulsa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->idBaixaCautelaAvulsa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Temcerteza que deseja deletar esse item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idBaixaCautelaAvulsa',
            'idCautelaAvulsa',
            'Recebedor',
            'DataDevolucao',
            'Equipamento',
            'ObservacaoBaixaCautela',
        ],
    ]) ?>

</div>

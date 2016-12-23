<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipamento */

$this->title = $model->NomeEquipamento;
$this->params['breadcrumbs'][] = ['label' => 'Equipamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipamento-view">

    

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->idEquipamento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->idEquipamento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja deletar este item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Descartar Equipamento', ['descarte-equipamento/create', 'id' => $model->idEquipamento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja dar baixa neste Equipamento?',
                'method' => 'post',
               // $this->redirect(array('descarte-equipamento/create', 'id' => $model->idEquipamento)),
            ], 
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idEquipamento',
            'NomeEquipamento',
            'Nserie',
            'NotaFiscal',
            'Localizacao',
            'StatusEquipamento',
            'OrigemEquipamento',
            //'ImagemEquipamento',
            [
                'attribute' => 'ImagemEquipamento',
                //'value' => "<a href=localhost/novoppgi/backend/web/".$model->edital."' target = '_blank'> Baixar </a>",
                'format'=>'raw',
                'value' => "<a href='".$model->ImagemEquipamento."' target = '_blank'> Foto  </a>"
            ],
        ],
    ]) ?>

</div>

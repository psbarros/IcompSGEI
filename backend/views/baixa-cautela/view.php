<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BaixaCautela */

$this->title = $model->idBaixaCautela;
$this->params['breadcrumbs'][] = ['label' => 'Baixa Cautelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="baixa-cautela-view">

    

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->idBaixaCautela], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->idBaixaCautela], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Temcerteza que deseja deletar esse item item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idBaixaCautela',
            'idCautela',
            'idEquipamento',
            'Recebedor',
            'DataDevolucao',
            'Equipamento',
            'ObservacaoBaixaCautela',
        ],
    ]) ?>

</div>

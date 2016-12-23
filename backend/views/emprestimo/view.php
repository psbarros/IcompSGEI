<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Emprestimo */

$this->title = $model->idEquipamento;
$this->params['breadcrumbs'][] = ['label' => 'Emprestimos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emprestimo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idEquipamento' => $model->idEquipamento, 'idCautela' => $model->idCautela], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idEquipamento' => $model->idEquipamento, 'idCautela' => $model->idCautela], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idEquipamento',
            'idCautela',
            'DataEmprestimo',
        ],
    ]) ?>

</div>

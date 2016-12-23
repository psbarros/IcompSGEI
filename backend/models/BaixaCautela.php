<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "j17_baixa_cautela".
 *
 * @property integer $idBaixaCautela
 * @property integer $idCautela
 * @property integer $idEquipamento
 * @property string $Recebedor
 * @property string $DataDevolucao
 * @property string $Equipamento
 * @property string $ObservacaoBaixaCautela
 */
class BaixaCautela extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'j17_baixa_cautela';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCautela', 'idEquipamento'], 'integer'],
            [['Recebedor', 'ObservacaoBaixaCautela'], 'required'],
            [['Recebedor', 'DataDevolucao', 'Equipamento', 'ObservacaoBaixaCautela'], 'string', 'max' => 50],
            [['idCautela'], 'exist', 'skipOnError' => true, 'targetClass' => Cautela::className(), 'targetAttribute' => ['idCautela' => 'idCautela']],
            [['idEquipamento'], 'exist', 'skipOnError' => true, 'targetClass' => Equipamento::className(), 'targetAttribute' => ['idEquipamento' => 'idEquipamento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idBaixaCautela' => 'Id Baixa Cautela',
            'idCautela' => 'Id Cautela',
            'idEquipamento' => 'Id Equipamento',
            'Recebedor' => 'Recebedor',
            'DataDevolucao' => 'Data Devolucao',
            'Equipamento' => 'Equipamento',
            'ObservacaoBaixaCautela' => 'Observacao Baixa Cautela',
        ];
    }
}

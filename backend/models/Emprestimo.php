<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "j17_emprestimo".
 *
 * @property integer $idEquipamento
 * @property integer $idCautela
 * @property string $DataEmprestimo
 */
class Emprestimo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'j17_emprestimo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEquipamento', 'idCautela'], 'required'],
            [['idEquipamento', 'idCautela'], 'integer'],
            [['DataEmprestimo'], 'safe'],
            [['idEquipamento'], 'exist', 'skipOnError' => true, 'targetClass' => Equipamento::className(), 'targetAttribute' => ['idEquipamento' => 'idEquipamento']],
            [['idCautela'], 'exist', 'skipOnError' => true, 'targetClass' => Cautela::className(), 'targetAttribute' => ['idCautela' => 'idCautela']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEquipamento' => 'Id Equipamento',
            'idCautela' => 'Id Cautela',
            'DataEmprestimo' => 'Data Emprestimo',
        ];
    }
}

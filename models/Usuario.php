<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property string $data
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'senha'], 'required'],
            [['data'], 'safe'],
            [['nome'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 150],
            [['senha'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'senha' => 'Senha',
            'data' => 'Data',
        ];
    }
    public function beforeValidate() {
        $f = Yii::$app->formatter;
        $this->data = date( 'Y-m-d', strtotime( $this->data ) );
        
        //$this->data_reserva = $f->asDate($this->data_reserva, 'yyyy-MM-dd');
        //$this->data_baixa = $f->asDate($this->data_baixa, 'yyyy-MM-dd');
        return parent::beforeValidate();
    }
}

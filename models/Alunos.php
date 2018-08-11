<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cad_alunos".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $telefone
 * @property string $celular
 * @property int $matricula
 */
class Alunos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cad_alunos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cpf', 'telefone', 'celular', 'matricula'], 'required'],
            [['matricula'], 'integer'],
            [['nome'], 'string', 'max' => 80],
            [['cpf', 'telefone', 'celular'], 'string', 'max' => 25],
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
            'cpf' => 'Cpf',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'matricula' => 'Matricula',
        ];
    }
}

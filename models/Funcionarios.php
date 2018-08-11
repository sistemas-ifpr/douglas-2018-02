<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cad_funcionarios".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $telefone
 * @property string $celular
 * @property string $endereco
 * @property string $data_admissao
 * @property string $data_demissao
 */
class Funcionarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cad_funcionarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cpf', 'telefone', 'celular', 'endereco', 'data_admissao', 'data_demissao'], 'required'],
            [['data_admissao', 'data_demissao'], 'safe'],
            [['nome', 'cpf', 'endereco'], 'string', 'max' => 80],
            [['telefone', 'celular'], 'string', 'max' => 20],
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
            'endereco' => 'Endereco',
            'data_admissao' => 'Data Admissao',
            'data_demissao' => 'Data Demissao',
        ];
    }
}

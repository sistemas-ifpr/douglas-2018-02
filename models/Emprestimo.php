<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emprestimo".
 *
 * @property int $id
 * @property int $titulo
 * @property string $data_emprestimo
 * @property int $aluno
 * @property int $funcionario
 * @property int $ativo
 *
 * @property Alunos $aluno
 * @property Funcionarios $funcionario
 * @property Titulos $titulo
 */
class Emprestimo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emprestimo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'data_emprestimo', 'aluno', 'funcionario', 'ativo', 'data_devolucao'], 'required'],
            [['titulo', 'aluno', 'funcionario', 'ativo'], 'integer'],
            [['data_emprestimo'], 'safe'],
            [['aluno'], 'exist', 'skipOnError' => true, 'targetClass' => Alunos::className(), 'targetAttribute' => ['aluno' => 'id']],
            [['funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionarios::className(), 'targetAttribute' => ['funcionario' => 'id']],
            [['titulo'], 'exist', 'skipOnError' => true, 'targetClass' => Titulos::className(), 'targetAttribute' => ['titulo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'data_emprestimo' => 'Data Emprestimo',
            'aluno' => 'Aluno',
            'funcionario' => 'Funcionario',
            'ativo' => 'Ativo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(Alunos::className(), ['id' => 'aluno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(Funcionarios::className(), ['id' => 'funcionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitulo()
    {
        return $this->hasOne(Titulos::className(), ['id' => 'titulo']);
    }
}

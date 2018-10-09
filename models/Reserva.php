<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property int $id
 * @property int $isbn
 * @property string $data_reserva
 * @property int $matricula_aluno
 * @property string $data_baixa
 * @property int $funcionario
 *
 * @property Funcionarios $funcionario
 * @property Titulos $isbn
 * @property Alunos $matriculaAluno
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isbn', 'data_reserva', 'matricula_aluno', 'funcionario', 'ativo', 'data_baixa'], 'required'],
            [['isbn', 'matricula_aluno', 'funcionario'], 'integer'],
            [['data_reserva', 'data_baixa'], 'safe'],
            [['funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionarios::className(), 'targetAttribute' => ['funcionario' => 'id']],
            [['isbn'], 'exist', 'skipOnError' => true, 'targetClass' => Titulos::className(), 'targetAttribute' => ['isbn' => 'id']],
            [['matricula_aluno'], 'exist', 'skipOnError' => true, 'targetClass' => Alunos::className(), 'targetAttribute' => ['matricula_aluno' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'isbn' => 'Isbn',
            'data_reserva' => 'Data Reserva',
            'matricula_aluno' => 'Matricula Aluno',
            'data_baixa' => 'Data Baixa',
            'funcionario' => 'Funcionário',
            'ativo' => 'Ativo',

        ];
    }

    public function beforeValidate() {
        $f = Yii::$app->formatter;
        $this->data_reserva = date( 'Y-m-d', strtotime( $this->data_reserva ) );
        $this->data_baixa = date( 'Y-m-d', strtotime( $this->data_baixa ) ); 
        //$this->data_reserva = $f->asDate($this->data_reserva, 'yyyy-MM-dd');
        //$this->data_baixa = $f->asDate($this->data_baixa, 'yyyy-MM-dd');
        return parent::beforeValidate();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(Funcionarios::className(), ['id' => 'funcionario'])->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIsbn()
    {
        return $this->hasOne(Titulos::className(), ['id' => 'isbn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculaAluno()
    {
        return $this->hasOne(Alunos::className(), ['id' => 'matricula_aluno']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cad_titulos".
 *
 * @property int $id
 * @property string $tipo
 * @property string $titulo
 * @property string $autor
 * @property int $isbn
 * @property string $edicao
 * @property string $ano_lancamento

 */
class Titulos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cad_titulos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'titulo', 'autor', 'isbn', 'edicao', 'ano_lancamento'], 'required'],
            [['isbn'], 'integer'],
            [['ano_lancamento'], 'safe'],
            [['tipo', 'titulo', 'autor', 'edicao'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'titulo' => 'Titulo',
            'autor' => 'Autor',
            'isbn' => 'Isbn',
            'edicao' => 'Edicao',
            'ano_lancamento' => 'Ano Lancamento',
            'referencia' => 'Referência',
        ];
    }
    public function getReferencia(){
        return $this->autor .'.' .$this->titulo.'.' .$this->edicao.'.' .$this->ano_lancamento.'.';
    }
}

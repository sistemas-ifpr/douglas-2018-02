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
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
    public static function findIdentity($id){
        return static::findOne(['email' => $id]);

    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->email;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }



    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function isAdmin()
    {
        return $this -> email === "bergamaschidouglas@gmail.com";
    }


    public function beforeValidate() {
        $f = Yii::$app->formatter;
        $this->data = date( 'Y-m-d', strtotime( $this->data ) );
        
        //$this->data_reserva = $f->asDate($this->data_reserva, 'yyyy-MM-dd');
        //$this->data_baixa = $f->asDate($this->data_baixa, 'yyyy-MM-dd');
        return parent::beforeValidate();
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CompleteForm extends Model{

    public $username;
    public $password;
    public $name;

    public function rules()
    {
        return [
            ['username', 'trim'],
            [['username', 'password', 'name'], 'required'],
            ['name', 'string', 'max' => 255],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'string', 'min' => 6, 'max' => 255],

            [
                'username',
                'unique',
                'targetClass' => Admin::className(),
                'message' => Yii::t('app', 'Este utilizador já foi obtido.')
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Utilizador'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'name' => Yii::t('app', 'Nome')
        ];
    }

    public function complete($a)
    {
        if (!$this->validate()) {
            return null;
        }

        $admin = $a;
        $admin->name = $this->name;
        $admin->username = $this->username;
        $admin->status = Admin::STATUS_ACTIVE;
        $admin->generateAuthKey();
        $admin->setPassword($this->password);
        $admin->generatePasswordResetToken();

        return $admin->save() ? true : false;
    }
}
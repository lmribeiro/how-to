<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Register form
 */
class RegisterForm extends Model
{

    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'email'], 'string', 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            [
                'email',
                'unique',
                'targetClass' => Admin::className(),
                'message' => Yii::t('app', 'Este endereço de email já foi registado.')
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Nome'),
            'email' => Yii::t('app', 'Email'),
        ];
    }

    /**
     * Register admins.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function register()
    {
        if (!$this->validate()) {
            return null;
        }

        $merchant = new Merchant();
        $merchant->email = $this->email;
        $merchant->name = $this->name;
        $merchant->status = 1;
        if (!$merchant->save()) {
            return null;
        }

        $admin = new Admin();
        $admin->generateUsername();
        $admin->generateAuthKey();
        $admin->email = $this->email;
        $admin->name = $this->name;

        return $admin->save() ? $admin : null;
    }

}

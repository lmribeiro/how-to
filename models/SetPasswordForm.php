<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Password reset form
 */
class SetPasswordForm extends Model
{

    public $password;
    private $_admin;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [['password', 'required'], ['password', 'string', 'min' => 6]];
    }

    public function attributeLabels()
    {
        return [
            'password' => Yii::t('app', 'Password')
        ];
    }

    public function setAdmin($admin)
    {
        $this->_admin = $admin;
    }

    /**
     * Resets password.
     */
    public function resetPassword()
    {
        $this->_admin->setPassword($this->password);
        $this->_admin->status = 1;
        $this->_admin->removePasswordResetToken();

        return $this->_admin->save(false);
    }
}

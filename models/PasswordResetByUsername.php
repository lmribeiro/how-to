<?php

namespace app\models;

use Yii;
use yii\base\Model;

class PasswordResetByUsername extends Model
{

    public $username;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string'],
            ['username', 'validateUser'],
            [
                'username',
                'exist',
                'targetClass' => '\app\models\Admin',
                'filter' => ['status' => Admin::STATUS_ACTIVE],
                'message' => Yii::t('app', 'Não existe nenhum utilizador com este username.')
            ]
        ];
    }

    public function validateUser()
    {
        $admin = Admin::findOne([
                    'username' => $this->username
        ]);

        if ($admin->status == Admin::STATUS_INACTIVE) {
            $admin->sendEmail();
            $this->addError('username', Yii::t('app', 'A sua conta ainda não foi ativada.')." ".
                    Yii::t('app', 'Consulte o seu email, pois enviamos novo email de ativação.'));
            return false;
        }
    }

    /**
     * Sends an email with a link, for resetting the password.
     */
    public function sendEmail()
    {
        $admin = Admin::findOne([
                    'status' => Admin::STATUS_ACTIVE,
                    'username' => $this->username
        ]);

        if (!$admin) {
            return false;
        }

        if (!Admin::isPasswordResetTokenValid($admin->password_reset_token)) {
            $admin->generatePasswordResetToken();
            if (!$admin->save()) {
                return false;
            }
        }

        return Yii::$app->mailer
                        ->compose(['html' => 'reset_password',], ['admin' => $admin])
                        ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name])
                        ->setTo($admin->email)
                        ->setSubject(Yii::$app->name." | ".Yii::t('app', 'Recuperar Password'))
                        ->send();
    }

}

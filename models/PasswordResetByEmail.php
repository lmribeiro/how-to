<?php

namespace app\models;

use Yii;
use yii\base\Model;

class PasswordResetByEmail extends Model
{

    public $email;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'validateEmail'],
            ['email', 'validateUser'],
            [
                'email',
                'exist',
                'targetClass' => '\app\models\Admin',
                'filter' => ['status' => Admin::STATUS_ACTIVE],
                'message' => Yii::t('app', 'Não existe nenhum utilizador com este email.')
            ]
        ];
    }

    /**
     * Validate Email
     */
    public function validateEmail()
    {
        $validator = new \app\components\EmailValidator();
        $result = $validator->validate($this->email);
        if (!$result->is_valid) {
            $this->addError('email', Yii::t('app', 'O email inserido não é válido!'));
        }
    }

    public function validateUser()
    {
        $admin = Admin::findOne([
            'email' => $this->email
        ]);

        if ($admin && $admin->status == Admin::STATUS_INACTIVE) {
            $admin->sendEmail();
            $this->addError('email', Yii::t('app', 'A sua conta ainda não foi ativada.') . " " .
                Yii::t('app', 'Consulte o seu email, pois enviamos novo email de ativação.'));
            return false;
        }
        
        return false;
    }

    /**
     * Sends an email with a link, for resetting the password.
     */
    public function sendEmail()
    {

        $admin = Admin::findOne([
            'status' => Admin::STATUS_ACTIVE,
            'email' => $this->email
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

        return Yii::$app->mailer->compose(['html' => 'reset_password',], ['admin' => $admin])
            ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name])
            ->setTo($this->email)
            ->setSubject(Yii::$app->name . " | " . Yii::t('app', 'Recuperar Password'))
            ->send();
    }
}

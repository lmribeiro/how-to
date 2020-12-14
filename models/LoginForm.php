<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\Session;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $emailusername;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['emailusername', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['emailusername', 'checkStatus'],
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'emailusername' => Yii::t('app', 'Email ou Nome de Utilizador'),
            'rememberMe' => Yii::t('app', 'Lembrar-me?'),
            'password' => Yii::t('app', 'Password')
        ];
    }

    public function checkStatus($attribute, $params)
    {
        $admin = Admin::find()
            ->where(['username' => $this->emailusername])
            ->one();
        if ($admin === null) {
            $admin = Admin::find()
                ->where(['email' => $this->emailusername])
                ->one();
        }

        if ($admin !== null) {
            if ($admin->status == Admin::STATUS_INACTIVE) {
                Yii::$app
                    ->getSession()
                    ->setFlash('info', Yii::t('app', 'Valide primeiro a sua conta.'));
                $this->addError($attribute, Yii::t('app', 'Valide primeiro a sua conta.'));
            }
        }
    }

    /**
     * Validates the password.
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if ($user && !$user->validatePassword($this->password)) {
                //Add fail try
                $session = new Session;
                $session->open();

                $fail = $session['fail'];

                if ($fail && $fail['email'] == $user->email) {
                    $fail['count'] += 1;
                    $fail['date'] = date('Y-m-d G:i:s');
                } else {
                    $fail = [
                        'date' => date('Y-m-d G:i:s'),
                        'platform' => Yii::$app->userAgent->platform,
                        'ip' => Yii::$app->request->userIP,
                        'os' => Yii::$app->userAgent->os,
                        'browser' => Yii::$app->userAgent->browser,
                        'browser_version' => Yii::$app->userAgent->browserVersion,
                        'email' => $user->email,
                        'count' => 1
                    ];
                }
                $session['fail'] = $fail;

                if ($fail['count'] == 3) {
                    \Yii::$app->mailer->htmlLayout = "layouts/bo";

                    $email = \Yii::$app->mailer
                            ->compose('protection_login', [
                                'login' => $fail,
                                'user' => $user])
                            ->setTo($user->email)
                            ->setFrom([
                                \Yii::$app->params['adminEmail'] => \Yii::$app->name,
                            ])
                            ->setSubject(Yii::$app->name." | ".Yii::t('app', 'Proteção login'))
                            ->send();

                    $session->remove('fail');
                }

                $this->addError($attribute, Yii::t('app', 'Utilizador ou Password inválida.'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     */
    public function login()
    {
        if ($this->validate()) {
            if (!$user = $this->getUser()) {
                return false;
            }
            return Yii::$app->user->login(
                $user,
                $this->rememberMe ? 3600 * 24 * 30 : 0
            );
        }

        return false;
    }

    /**
     * Finds user by [[emailusername]]
     */
    public function getUser()
    {
        if ($this->_user === false) {
            if (filter_var($this->emailusername, FILTER_VALIDATE_EMAIL)) {
                $this->_user = Admin::findByEmail($this->emailusername);
            } else {
                $this->_user = Admin::findByUsername($this->emailusername);
            }
        }

        if (!$this->_user) {
            $this->addError('emailusername', Yii::t('app', 'Email/Nome de Utilizador e/ou palavra-passe incorretos'));
        }

        return $this->_user;
    }
}

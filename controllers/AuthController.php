<?php

namespace app\controllers;

use app\models\Admin;
use app\models\LoginForm;
use app\models\PasswordResetByEmail;
use app\models\PasswordResetByUsername;
use app\models\RegisterForm;
use app\models\ResetPassword;
use app\models\SetPasswordForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;

class AuthController extends KbController
{

    public $layout = '@app/views/layouts/guest';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'signup', 'reset-password', 'set-password', 'verify-account', 'theme', 'language'],
                        'allow' => true,
                        'roles' => ['?']
                    ],
                    [
                        'actions' => ['logout', 'sidebar', 'notifications'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ],
                'denyCallback' => function () {
                    return $this->goHome();
                }
            ]
        ];
    }

    /**
     * Verify Account action.
     */
    public function actionVerifyAccount($key)
    {
        $model = new CompleteForm();
        $admin = Admin::find()->where(['auth_key' => $key, 'status' => Admin::STATUS_INACTIVE])->one();

        if (!$admin) {
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'A sua conta já está ativa. Faça login.'));
            return $this->goHome();
        }

        $model->name = $admin->name;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->complete($admin)) {
                Yii::$app->user->login(Admin::findByEmail($admin->email));
                Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Conta validada com sucesso'));
                return $this->goHome();
            }
        }

        return $this->render('verify-account', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/index']);
        }

        $model = new LoginForm();

        if (Admin::find()->count() == 0) {
            $password = '123456';

            $admin = new Admin();
            $admin->role = 'ADMIN';
            $admin->username = 'admin';
            $admin->email = 'admin@how-to.com';
            $admin->name = 'Administrator';
            $admin->setPassword($password);
            $admin->generateAuthKey();
            $admin->status = 1;
            $admin->save();

            $model->emailusername = $admin->email;
            $model->password = $password;

            Yii::$app->session->setFlash('success', Yii::t('app', 'Administrador master adicionado com sucesso'));
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->login()) {
                return $this->redirect(['site/index']);
            }

            $model->password = '';
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionSignup()
    {
        $model = new RegisterForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($admin = $model->register()) {
                $email = \Yii::$app->mailer->compose('verify_account', [
                    'admin' => $admin,
                    'is_bo' => true])->setTo($admin->email)
                    ->setFrom([
                        \Yii::$app->params['adminEmail'] => \Yii::$app->name,
                    ])
                    ->setSubject(Yii::$app->name . " | " . Yii::t('app', 'Validação do registo'))
                    ->send();

                if ($email) {
                    Yii::$app->getSession()->setFlash(
                        'success', Yii::t('app', 'Verifique o seu email para concluir o processo')
                    );
                } else {
                    Yii::$app->getSession()->setFlash(
                        'warning', Yii::t('app', 'Ocorreu um erro a criar a sua conta. Por favor tente de novo.')
                    );
                }

                return $this->goHome();
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Reset Password.
     */
    public function actionResetPassword()
    {
        $model = new ResetPassword();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (filter_var($model->emailusername, FILTER_VALIDATE_EMAIL)) {
                $byEmail = new PasswordResetByEmail();
                $byEmail->email = $model->emailusername;

                if ($byEmail->validate()) {
                    if ($byEmail->sendEmail()) {
                        Yii::$app->session->setFlash(
                            'success', Yii::t(
                            'app', 'Verifique o seu email para concluir o processo'
                        )
                        );

                        return $this->goHome();
                    } else {
                        Yii::$app->session->setFlash(
                            'error', Yii::t('app', 'Desculpe, não foi possível enviar o email para recuperar a palavra-passe')
                        );
                    }
                }
                $model->addError('emailusername', $byEmail->errors['email'][0]);
            } else {
                $byUsername = new PasswordResetByUsername();
                $byUsername->username = $model->emailusername;

                if ($byUsername->validate()) {
                    if ($byUsername->sendEmail()) {
                        Yii::$app->session->setFlash(
                            'success', Yii::t('app', 'Verifique o seu email para concluir o processo')
                        );

                        return $this->goHome();
                    } else {
                        Yii::$app->session->setFlash(
                            'error', Yii::t('app', 'Desculpe, não foi possível enviar o email para recuperar a palavra-passe')
                        );
                    }
                }
                $model->addError('emailusername', $byUsername->errors['username'][0]);
            }
        }

        return $this->render('reset-password', [
            'model' => $model,
        ]);
    }

    /**
     * Set Password.
     */
    public function actionSetPassword($token = false)
    {
        $model = new SetPasswordForm();

        if (empty($token) || !is_string($token)) {
            Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Pedido inválido/expirado. Faça novo pedido de validação'));
            return $this->redirect(['auth/login']);
        }

        $admin = Admin::findByPasswordResetToken($token);
        $model->setAdmin($admin);
        if (!$admin) {
            Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Pedido inválido/expirado. Faça novo pedido de validação'));
            return $this->redirect(['auth/login']);
        }

        if (
            $model->load(Yii::$app->request->post()) &&
            $model->validate() &&
            $model->resetPassword()
        ) {
            Yii::$app->session->setFlash(
                'success', Yii::t('app', 'Password alterada com sucesso')
            );

            return $this->goHome();
        }

        return $this->render('set-password', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        $theme = Yii::$app->session->get('theme', false);
        Yii::$app->user->logout();
        Yii::$app->session->set('theme', $theme);
        return $this->redirect('/');
    }

}

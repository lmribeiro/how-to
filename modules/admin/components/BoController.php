<?php

namespace app\modules\admin\components;

use Yii;
use app\controllers\BaseController;
use app\models\Admin;
use yii\filters\AccessControl;

class BoController extends BaseController
{

    public $topNav = null;
    public $sideNav = null;
    public $admin = null;

    public function actionBeforAction()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/');
        }
    }

    public function access($role, $condition = null)
    {
        if (!($this->admin->role == "$role" || ($condition && $condition == $this->admin->id))) {
            Yii::$app->getSession()->setFlash('error', 'Sem permissões para aceder a esta página.');

            return false;
        }

        return true;
    }

    public function init()
    {
        parent::init();

        if (isset($_GET['lg'])) {
            Yii::$app->language = trim(strip_tags($_GET['lg']));
//            Yii::$app->session['_lang'] = Yii::$app->language;
        } else {
            Yii::$app->language = isset(Yii::$app->session['_lang']) ? Yii::$app->session['_lang'] : 'pt';
        }

        if (isset(Yii::$app->user->identity)) {
            $this->admin = Admin::findOne(Yii::$app->user->identity->id);
        }

        if (!in_array($this->id, ['auth'])) {
            $this->topNav = Nav::getTopNav();
            $this->sideNav = Nav::getSideNav();
        }

    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }
}

<?php

namespace app\controllers;

use Yii;

class KbController extends BaseController
{

    public $homeUrl = "/";
    public $topNav = null;
    public $admin = null;

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
    }

}

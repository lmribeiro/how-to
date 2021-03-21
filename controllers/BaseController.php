<?php

namespace app\controllers;

use app\components\FeNav;
use yii\web\Controller;

class BaseController extends Controller
{
    public $homeUrl = "/";
    public $topNav = null;
    public $admin = null;

    public function init()
    {
        $this->topNav = FeNav::getTopNav();
        parent::init();
    }

    /**
     * Check access
     * @param $role User's role
     * @param null $condition
     * @return bool
     */
    public function access($role, $condition = null)
    {
        if (!($this->admin->role == "$role" || ($condition && $condition == $this->admin->id))) {
            Yii::$app->getSession()->setFlash('error', 'Sem permissões para aceder a esta página.');

            return false;
        }

        return true;
    }

    /**
     * Is mobile?
     * @return bool
     */
    public function isMobile(): bool
    {
        $detect = new \Mobile_Detect();
        if ($detect->isMobile() && !$detect->isTablet()) {
            return true;
        }
    }
}

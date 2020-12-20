<?php

namespace app\controllers;

use app\components\FeNav;
use yii\web\Controller;

class BaseController extends Controller
{

    public $homeUrl = "/";

    public function init()
    {
        $this->topNav = FeNav::getTopNav();
        parent::init();
    }

    public function isMobile()
    {
        $detect = new \Mobile_Detect();
        if ($detect->isMobile() && !$detect->isTablet()) {
            return true;
        }
    }

}

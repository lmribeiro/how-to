<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Language;

class BaseController extends Controller
{

    public $homeUrl = "/";

    public function init()
    {
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

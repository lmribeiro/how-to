<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\components\BoController;

class DashboardController extends BoController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

}

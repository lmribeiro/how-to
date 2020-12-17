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

    public function actionSidebar(): bool
    {
        Yii::$app->session->set('minSidebar', Yii::$app->request->post('min', false));
        return true;
    }

}

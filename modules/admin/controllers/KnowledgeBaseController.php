<?php

namespace app\modules\admin\controllers;

use app\modules\admin\components\BoController;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class KnowledgeBaseController extends BoController
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (!$this->access('ADMIN')) {
            $this->redirect(['dashboard/index']);

            return false;
        }

        return parent::beforeAction($action);
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('/knowledge-base', []);
    }

}

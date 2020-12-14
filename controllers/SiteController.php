<?php

namespace app\controllers;

use app\models\Article;
use Yii;

class SiteController extends KbController
{

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
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [],
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/auth/login']);
        }

        $articles = Article::find()
            ->where(['status' => 'PUBLISHED'])
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(10)
            ->all();

        return $this->render('index', [
            'articles' => $articles,
        ]);
    }
}

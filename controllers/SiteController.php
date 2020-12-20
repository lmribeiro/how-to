<?php

namespace app\controllers;

use app\models\Article;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;

class SiteController extends KbController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [''],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['*'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [],
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            $this->layout = 'guest';
            return $this->render('index', []);
        }

        $query  = Article::find()
            ->where(['status' => 'PUBLISHED'])
            ->orderBy(['created_at' => SORT_DESC]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->setPageSize(10);
        $articles = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('articles', [
            'articles' => $articles,
            'pages' => $pages,
        ]);
    }

    /**
     * Set/remove night mode
     *
     * @return Response true
     */
    public function actionTheme($id): Response
    {
        Yii::$app->session->set('theme', $id);
        return $this->redirect(Yii::$app->request->referrer);
    }
}

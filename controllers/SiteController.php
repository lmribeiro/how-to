<?php

namespace app\controllers;

use app\models\Article;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;

class SiteController extends BaseController
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

    /**
     * Index
     * @return string
     */
    public function actionIndex()
    {
        $query = Article::find()
            ->where(['status' => 'PUBLISHED'])
            ->orderBy(['created_at' => SORT_DESC]);

        $pages = new Pagination(['totalCount' => $query->count()]);
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

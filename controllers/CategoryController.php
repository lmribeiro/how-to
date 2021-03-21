<?php

namespace app\controllers;

use app\models\Article;
use app\models\ArticleCategory;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class CategoryController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['view'],
                'rules' => [
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['@'],
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
     * View
     * @param $id Category's ID
     */
    public function actionView($id)
    {
        $model = ArticleCategory::findOne($id);

        $query = Article::find()
            ->where(['article_category_id' => $model->id, 'status' => 'PUBLISHED'])
            ->orderBy(['created_at' => SORT_DESC]);

        $pages = new Pagination(['totalCount' => $query->count()]);
        $pages->setPageSize(10);
        $articles = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('view', [
            'model' => $model,
            'articles' => $articles,
            'pages' => $pages,
        ]);
    }
}

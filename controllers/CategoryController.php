<?php

namespace app\controllers;

use app\models\Article;
use app\models\ArticleCategory;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class CategoryController extends KbController
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
     *
     * @param $id
     * @return string
     */
    public function actionView($id): string
    {
        $model = ArticleCategory::findOne($id);

        $query = Article::find()
            ->where(['article_category_id' => $model->id, 'status' => 'PUBLISHED'])
            ->orderBy(['created_at' => SORT_DESC]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
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

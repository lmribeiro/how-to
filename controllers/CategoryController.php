<?php

namespace app\controllers;

use app\models\Article;
use app\models\ArticleCategory;
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
        $articles = Article::find()->where("article_category_id = $model->id AND status = 'PUBLISHED'")->limit(10)->all();

        return $this->render('view', [
                    'model' => $model,
                    'articles' => $articles
        ]);
    }

}

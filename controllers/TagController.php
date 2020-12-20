<?php

namespace app\controllers;

use app\models\Article;
use app\models\ArticleTags;
use yii\data\Pagination;

class TagController extends KbController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
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
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [],
            ],
        ];
    }

    public function actionView($id)
    {
        $model = ArticleTags::findOne($id);

        $query = Article::find()
            ->joinWith('articleTags')
            ->where(['article_tags_article.article_tag_id' => $model->id, 'status' => 'PUBLISHED'])
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

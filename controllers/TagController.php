<?php

namespace app\controllers;

use app\models\Article;
use app\models\ArticleTags;

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
        $articles = Article::find()->joinWith('articleTags')->where("article_tags_article.article_tag_id = $model->id AND status = 'PUBLISHED'")->limit(10)->all();

        return $this->render('view', [
            'model' => $model,
            'articles' => $articles
        ]);
    }

}

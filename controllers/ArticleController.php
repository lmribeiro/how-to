<?php

namespace app\controllers;

use app\models\Article;
use Yii;
use yii\helpers\Json;

class ArticleController extends KbController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['view', 'search', 'vote-up', 'vote-down'],
                'rules' => [
                    [
                        'actions' => ['view', 'search', 'vote-up', 'vote-down'],
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
        $model = Article::findOne($id);

        if (!Yii::$app->request->getHeaders()->get('cache-control')) {
            $model->views += 1;
            $model->save();
        }

        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionSearch()
    {
        $search = Yii::$app->request->get('search');

        $articles = Article::find()
            ->joinWith('articleCategory')
            ->where(["LIKE", "title", $search])
            ->orWhere(["LIKE", "text", $search])
            ->orWhere(["LIKE", "article_category.name", $search])
            ->all();

        $result = [];
        foreach ($articles as $article) {
            $result[] = [
                'id' => $article->id,
                'value' => $article->title,
                'title' => $article->title,
                'excerpt' => $article->excerpt(),
                'date' => Yii::$app->formatter->asDate($article->created_at, 'd-MM-Y'),
                'category' => $article->articleCategory->name,
                'up_votes' => $article->up_votes,
                'down_votes' => $article->down_votes,
            ];
        }

        echo Json::encode($result);
        exit();
    }

    public function actionVoteUp()
    {
        $id = Yii::$app->request->post('id');
        $article = Article::findOne($id);
        $article->up_votes += 1;
        $article->update();

        echo Json::encode('OK');
    }

    public function actionVoteDown()
    {
        $id = Yii::$app->request->post('id');
        $article = Article::findOne($id);
        $article->down_votes += 1;
        $article->update();

        echo Json::encode('OK');
    }

}

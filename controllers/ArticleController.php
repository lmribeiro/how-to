<?php

namespace app\controllers;

use app\models\Article;
use app\models\ArticleTags;
use Yii;
use yii\base\ExitException;
use yii\base\InvalidConfigException;
use yii\db\StaleObjectException;
use yii\helpers\Json;

class ArticleController extends BaseController
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

    /**
     * View
     * @param $id Article's ID
     */
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

    /**
     * Create
     */
    public function actionCreate()
    {
        Yii::$app->layout = 'article';
        $model = new Article();
        $model->status = "REVIEW";
        $post = Yii::$app->request->post();

        if ($model->load($post) && $model->save()) {
            if (isset($post['Article']['articleTags'])) {
                foreach ($post['Article']['articleTags'] as $key => $value) {
                    $tags = ArticleTags::findOne($value);
                    $model->link('articleTags', $tags);
                }
            }
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Artigo adicionado com sucesso. Ficará disponivel após revisão.'));

            return $this->redirect(['/']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Search
     * @throws InvalidConfigException
     * @throws ExitException
     */
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
                'slug' => $article->getSlug(),
                'excerpt' => $article->excerpt(),
                'date' => Yii::$app->formatter->asDate($article->created_at, 'd-MM-Y'),
                'category' => $article->articleCategory->name,
                'up_votes' => $article->up_votes,
                'down_votes' => $article->down_votes,
            ];
        }

        return Json::encode($result);
        Yii::$app->end();
    }

    /**
     * Vote up
     * @throws ExitException
     * @throws StaleObjectException
     * @throws \Throwable
     */
    public function actionVoteUp()
    {
        $id = Yii::$app->request->post('id');
        $article = Article::findOne($id);
        $article->up_votes += 1;
        $article->update();

        return Json::encode('OK');
        Yii::$app->end();
    }

    /**
     * Vote down
     * @throws ExitException
     * @throws StaleObjectException
     * @throws \Throwable
     */
    public function actionVoteDown()
    {
        $id = Yii::$app->request->post('id');
        $article = Article::findOne($id);
        $article->down_votes += 1;
        $article->update();

        return Json::encode('OK');
        Yii::$app->end();
    }
}

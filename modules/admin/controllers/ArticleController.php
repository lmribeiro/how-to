<?php

namespace app\modules\admin\controllers;

use app\models\ArticleTags;
use app\models\ArticleTagsArticle;
use Yii;
use app\models\Article;
use app\models\ArticleCategory;
use app\models\ArticleSearch;
use app\modules\admin\components\BoController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends BoController
{
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}

	/**
	 * Lists all Article models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new ArticleSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Article model.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Article model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Article();
        $post = Yii::$app->request->post();

		if ($model->load($post) && $model->save()) {
            if (isset($post['Article']['articleTags']) && is_array($post['Article']['articleTags'])) {
                foreach ($post['Article']['articleTags'] as $key => $value) {
                    $tags = ArticleTags::findOne($value);
                    $model->link('articleTags', $tags);
                }
            }
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Criado com sucesso.'));

            return $this->redirect(['view', 'id' => $model->id]);
		}

		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing Article model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id)
	{
        $oldTags = [];
        $model = $this->findModel(str_replace('-', ' ', $id));
        $post = Yii::$app->request->post();

        foreach ($model->articleTags as $tag) {
            array_push($oldTags, $tag->id);
        }

        if ($model->load($post) && $model->save()) {
            if (isset($post['Article']['articleTags']) && is_array($post['Article']['articleTags'])) {
                foreach ($post['Article']['articleTags'] as $key => $value) {
                    $a = array_search($value, $oldTags);

                    if ($a === false) {
                        $tags = ArticleTags::findOne($value);
                        $model->link('articleTags', $tags);
                    } else {
                        unset($oldTags[$a]);
                    }
                }

                foreach ($oldTags as $key => $value) {
                    $articleTags = ArticleTagsArticle::find()->where(['article_id' => $model->id, 'article_tag_id' => $value])->one();
                    $articleTags->delete();
                }
            }
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Editado com sucesso.'));
            return $this->redirect(['index']);
        }

		return $this->render('update', [
			'model' => $model,
            'tags' => $oldTags,
		]);
	}

	/**
	 * Deletes an existing Article model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the Article model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Article the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Article::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
	}
}

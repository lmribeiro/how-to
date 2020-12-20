<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Faq;
use app\models\FaqCategory;
use app\models\FaqSearch;
use app\modules\admin\components\BoController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FaqController implements the CRUD actions for Faq model.
 */
class FaqController extends BoController
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

	public function actionFaqs()
	{
		return $this->render('/faqs', []);
	}

	/**
	 * Lists all Faq models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new FaqSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'faqCategories' => FaqCategory::find()->all()
		]);
	}

	/**
	 * Displays a single Faq model.
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
	 * Creates a new Faq model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Faq();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Criada com sucesso'));
            return $this->redirect(['index']);
		}

		return $this->render('create', [
			'model' => $model,
			'faqCategories' => FaqCategory::find()->all()
		]);
	}

	/**
	 * Updates an existing Faq model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Editada com sucesso'));
            return $this->redirect(['index']);
		}

		return $this->render('update', [
			'model' => $model,
			'faqCategories' => FaqCategory::find()->all()
		]);
	}

	/**
	 * Deletes an existing Faq model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Apagada com sucesso'));
		return $this->redirect(['index']);
	}

	/**
	 * Finds the Faq model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Faq the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Faq::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
	}
}

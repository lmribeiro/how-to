<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Settings;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\modules\admin\components\BoController;
use app\models\BoSettingsForm;
use app\models\PaymentSettingsForm;
use yii\web\NotFoundHttpException;

/**
 * SettingsController implements the CRUD actions for Settings model.
 */
class SettingsController extends BoController
{

	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['index', 'backoffice'],
				'rules' => [
					[
						'actions' => ['index', 'backoffice'],
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
	 * Lists all Settings models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		if (Yii::$app->user->identity->role == 'CAMARA') {
			return $this->redirect(['city/view', 'id' => Yii::$app->user->identity->city_id]);
		}
		return $this->render('index');
	}


	public function actionBackoffice()
	{
		$model = new BoSettingsForm();

		$model->terms_pt = $this->findModel('terms_pt');
		$model->terms_en = $this->findModel('terms_en');
		$model->privacy_pt = $this->findModel('privacy_pt');
		$model->privacy_en = $this->findModel('privacy_en');
		$model->admin_email = $this->findModel('admin_email');
		$model->faqs_email = $this->findModel('faqs_email');
		$model->noreplay_email = $this->findModel('noreplay_email');
		$model->error_report_email = $this->findModel('error_report_email');

		if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->saveAll()) {
			Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Editado com sucesso.'));
			return $this->redirect(['settings/index']);
		}

		return $this->render('backoffice', [
			'model' => $model
		]);
	}

	public function actionPayments()
	{
		$model = new PaymentSettingsForm();

		$model->sibs_live_mode = $this->findModel('sibs_live_mode');

		if ($model->load(Yii::$app->request->post()) && $model->saveAll()) {
			Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Editado com sucesso.'));
			return $this->redirect(['settings/index']);
		}

		return $this->render('payment', [
			'model' => $model
		]);
	}

	/**
	 * Finds the Settings model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param string $id
	 * @return Settings the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		$model = Settings::findOne($id);
		return $model ? $model->value : null;
	}
}

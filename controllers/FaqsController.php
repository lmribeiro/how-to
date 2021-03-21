<?php

namespace app\controllers;

use app\models\Faq;
use app\models\FaqCategory;
use Yii;
use yii\base\ExitException;
use yii\helpers\Json;
use yii\web\Response;

/**
 * FaqController implements the CRUD actions for Faq model.
 */
class FaqsController extends BaseController
{
    public $topNav = null;
    public $layout = '/base';

    /**
     * Lists all Faq models.
     * @return mixed
     */
    public function actionIndex()
    {
        $categories = FaqCategory::find()->all();
        $faqs = Faq::find()
            ->where(['faq_category_id' => $categories[0]->id])
            ->all();

        return $this->render('index', [
            'categories' => $categories,
            'faqs' => $faqs,
        ]);
    }

    /**
     * Get Faqs
     * @param $category Faq's Category ID
     * @throws ExitException
     */
    public function actionGetFaqs($category)
    {
        $faqs = Faq::find()
            ->where(['faq_category_id' => $category])
            ->all();

        return Json::encode($faqs);
        Yii::$app->end();
    }

    /**
     * Send Question
     * @return Response
     */
    public function actionSendQuestion()
    {
        $post = Yii::$app->request->post();

        Yii::$app->mailer
            ->compose('question_email', [
                'email' => $post['email'],
                'question' => $post['question']
            ])
            ->setTo(\Yii::$app->params['adminEmail'])
            ->setFrom([
                \Yii::$app->params['adminEmail'] => \Yii::$app->name,
            ])
            ->setSubject(Yii::$app->name)
            ->send();

        Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Enviada com sucesso.'));

        return $this->redirect(['index']);
    }

}

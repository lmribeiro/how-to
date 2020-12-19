<?php

namespace app\controllers;

use app\models\Faq;
use app\models\FaqCategory;
use Yii;
use yii\helpers\Json;

/**
 * FaqController implements the CRUD actions for Faq model.
 */
class FaqsController extends BaseController
{
    public $top_nav = null;
    public $layout = '/base';
    public $homeUrl = "faqs";

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

    public function actionGetFaqs($category)
    {
        $faqs = Faq::find()
            ->where(['faq_category_id' => $category])
            ->all();

        return Json::encode($faqs);
        exit();
    }

    public function actionSendQuestion()
    {
        $post = Yii::$app->request->post();

        \Yii::$app->mailer->htmlLayout = "layouts/bo";
        $email = \Yii::$app->mailer
            ->compose('question_email', [
                'email' => $post['email'],
                'question' => $post['question']
            ])
            ->setTo(\Yii::$app->params['adminEmail'])
            ->setFrom([
                \Yii::$app->params['adminEmail'] => \Yii::$app->name,
            ])
            ->setSubject(Yii::$app->name . " | " . Yii::t('app', 'Questão'))
            ->send();

        Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Enviada com sucesso.'));

        return $this->redirect(['index']);
    }

}

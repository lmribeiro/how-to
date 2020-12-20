<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Faq */
/* @var $faqCategories app\models\FaqCategory[] */

$this->title = Yii::t('app', 'Criar Questão');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'FAQs'), 'url' => ['faqs']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Questões'), 'url' => ['questions']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-header">
        <h4><?= Html::encode($this->title) ?></h4>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'faqCategories' => $faqCategories
    ]) ?>

</div>

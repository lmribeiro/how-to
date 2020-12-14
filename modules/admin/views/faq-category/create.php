<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FaqCategory */

$this->title = Yii::t('app', 'Criar Categoria');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'FAQs'), 'url' => ['faq/faqs']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-header">
        <h4><?= Html::encode($this->title) ?></h4>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

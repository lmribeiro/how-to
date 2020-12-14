<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = Yii::t('app', 'Editar Artigo: {name}', [
	'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Knowledge Base'), 'url' => ['knowledge-base/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editar');
?>
<div class="card">
	<div class="card-header">
		<h4><?= Html::encode($this->title) ?></h4>
	</div>

	<?= $this->render('_form', [
		'model' => $model,
		'article_categories' => $article_categories
	]) ?>

</div>
<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categorias');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Knowledge Base'), 'url' => ['knowledge-base/index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['modals'][] = 'modal';
?>
<div class="card">
	<div class="card-header">
		<h4><?= Html::encode($this->title) ?></h4>
		<div class="card-header-action">
			<?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Nova'), ['create'], ['class' => 'btn btn-icon icon-left btn-success']); ?>
		</div>
	</div>

	<div class="card-body">

		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'columns' => [
				'name',
				$actionCol = Yii::$app->params['actions'](['template' => '{update}{delete}']),
			],
		]); ?>
	</div>
</div>

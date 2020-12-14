<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ArticleTags */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Knowledge Base'), 'url' => ['knowledge-base/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['modals'][] = 'modal';
\yii\web\YiiAsset::register($this);
?>
<div class="card">

	<div class="card-header">
		<h4><?= Html::encode($this->title) ?></h4>
		<div class="card-header-action">
			<?= Html::a('<i class="fas fa-edit"></i> ' . Yii::t('app', 'Editar'), ['update', 'id' => $model->id], ['class' => 'btn btn-icon icon-left btn-warning']); ?>
			<?= Html::a('<i class="fas fa-trash"></i> ' . Yii::t('app', 'Apagar'), '#', ['class' => 'btn btn-icon icon-left btn-danger btn-delete', 'data-id' => $model->id, 'data-toggle' => 'modal', 'data-target' => '#delete_modal']); ?>
		</div>
	</div>

	<div class="card-body">
		<?= DetailView::widget([
			'model' => $model,
			'attributes' => [
				'name',
				'created_at',
				'updated_at',
			],
		]) ?>
	</div>
</div>
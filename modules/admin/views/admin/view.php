<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\widgets\BooleanLabel;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administradores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['modals'][] = 'modal';

\yii\web\YiiAsset::register($this);

?>
<div class="card">

	<div class="card-header">
		<h4><?= Html::encode($this->title); ?></h4>
		<div class="card-header-action">
			<?= Html::a('<i class="fas fa-edit"></i> ' . Yii::t('app', 'Editar'), ['update', 'id' => $model->id], ['class' => 'btn btn-icon icon-left btn-warning']); ?>

			<?php
			if (Yii::$app->user->identity->id != $model->id) {
				echo Html::a('<i class="fas fa-trash"></i> ' . Yii::t('app', 'Apagar'), '#', ['class' => 'btn btn-icon icon-left btn-danger btn-delete', 'data-id' => $model->id, 'data-toggle' => 'modal', 'data-target' => '#delete_modal']);
			}

			?>

		</div>
	</div>

	<div class="card-body">
		<?=
			DetailView::widget([
				'model' => $model,
				'attributes' => [
					'username',
					'email:email',
					[
						'attribute' => 'role',
						'format' => 'raw',
						'visible' => Yii::$app->user->identity->role == 'ADMIN',
					],
					[
						'attribute' => 'merchant_id',
						'format' => 'raw',
						'visible' => Yii::$app->user->identity->role == 'ADMIN' && $model->role == "MERCHANT",
						'value' => function ($model) {
							return $model->merchant ? $model->merchant->name : null;
						},
					],
					[
						'attribute' => 'city_id',
						'format' => 'raw',
						'visible' => Yii::$app->user->identity->role == 'ADMIN' && $model->role == "CAMARA",
						'value' => function ($model) {
							return $model->city ? $model->city->name : null;
						},
					],
					[
						'attribute' => 'can_edit',
						'format' => 'raw',
						'visible' => Yii::$app->user->identity->role == 'ADMIN' && $model->role == "CAMARA",
						'value' => function ($model) {
							return BooleanLabel::widget(['value' => $model->can_edit]);
						},
					],
					[
						'attribute' => 'status',
						'format' => 'raw',
						'value' => function ($model) {
							return $model->getStatusLabel();
						},
					],
					[
						'attribute' => 'is_logged',
						'format' => 'raw',
						'value' => function ($model) {
							return BooleanLabel::widget(['value' => $model->is_logged]);
						},
					],
					'latest_login',
					'created_at',
				],
			]);

		?>

	</div>
</div>
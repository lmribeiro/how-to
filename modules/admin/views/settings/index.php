<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Definições');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="card">
	<div class="card-header">
		<h4><?= Html::encode($this->title) ?></h4>
	</div>

	<div class="card-body">

		<div class="row">
			<?php if (Yii::$app->user->identity->role == 'ADMIN') : ?>

				<?php include __DIR__ . '/index/_general.php'; ?>
				<?php include __DIR__ . '/index/_payments.php'; ?>
				<?php include __DIR__ . '/index/_language.php'; ?>

			<?php else : ?>

				<?php include __DIR__ . '/index/_general_merchant.php'; ?>

			<?php endif; ?>

		</div>
	</div>
</div>
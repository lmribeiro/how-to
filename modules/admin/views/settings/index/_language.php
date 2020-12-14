<?php

use yii\helpers\Html;

?>

<!-- General -->
<div class="col-lg-6">
	<div class="card card-large-icons">
		<div class="card-icon bg-primary text-white">
			<i class="fas fa-flag"></i>
		</div>
		<div class="card-body">
			<h4><?= Yii::t('app', 'Idiomas'); ?></h4>
			<p><?= Yii::t('app', 'Lista de idiomas') ?></p>
			<?= Html::a('<i class="fas fa-edit"></i> ' . Yii::t('app', 'Editar'), ['/admin/language'], ['class' => 'card-cta']) ?>
		</div>
	</div>
</div>
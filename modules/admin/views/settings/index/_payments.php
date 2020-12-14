<?php

use yii\helpers\Html;

?>

<!-- General -->
<div class="col-lg-6">
	<div class="card card-large-icons">
		<div class="card-icon bg-primary text-white">
			<i class="far fa-credit-card"></i>
		</div>
		<div class="card-body">
			<h4><?= Yii::t('app', 'Pagamentos'); ?></h4>
			<p><?= Yii::t('app', 'Definições SIBS') ?></p>
			<?= Html::a('<i class="fas fa-edit"></i> ' . Yii::t('app', 'Editar'), ['settings/payments'], ['class' => 'card-cta']) ?>
		</div>
	</div>
</div>
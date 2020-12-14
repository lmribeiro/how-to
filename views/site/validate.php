<?php
$this->title = Yii::t('app', 'Validar e-mail');
?>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
	<div class="container">
		<div class="jumbotron text-center">
			<div>
				<?php if ($status === 'success') : ?>
					<i class="text-success fa fa-3x fa-check"></i>
				<?php else : ?>
					<i class="text-danger fa fa-3x fa-times"></i>
				<?php endif; ?>
			</div>
			<div class="display-4">
				<?= $message ?>
			</div>
		</div>
	</div>
</div>
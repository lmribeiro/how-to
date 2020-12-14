<?php

use yii\widgets\ActiveForm;

?>
<?php $form = ActiveForm::begin([
	'id' => 'form-archive',
]); ?>

<!-- Modal -->
<div id="archive_modal" class="modal fade delete_modal" role="dialog" arian-hidden="true" tabindex="-1">
	<div class="modal-dialog modal-md">

		<!-- Modal content-->
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h5 class="modal-title"><?= Yii::t('app', 'Confirmar') ?></h5>
				<button class="close" data-dismiss="modal">×</button>
			</div>

			<!-- Modal Body -->
			<div class="modal-body">
				<?= Yii::t('app', 'Tem a certeza que pretende arquivar esta encomenda?') ?>
			</div>

			<!-- Modal Footer -->
			<div class="modal-footer">
				<button class="btn btn-primary" data-dismiss="modal" type="button">
					<?= Yii::t('app', 'Cancelar'); ?>
				</button>
				<button class="btn btn-success" type="submit">
					<?= Yii::t('app', 'Ok'); ?>
				</button>
			</div>
		</div>

	</div>
</div>

<?php ActiveForm::end(); ?>
<script>
	$('#form-archive').submit(function() {
		$('#archive_modal').modal('hide');
	});

	$('.btn-delete').on('click', function() {
		url = "archive?id=" + $(this).data('id');

		$('#form-archive').attr('action', url);
	});
</script>
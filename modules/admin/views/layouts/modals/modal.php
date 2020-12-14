<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>
<?php $form = ActiveForm::begin([
    'id' => 'form-delete',
]); ?>

<!-- Modal -->
<div id="delete_modal" class="modal fade delete_modal" role="dialog" arian-hidden="true" tabindex="-1">
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
                <?= Yii::t('app', 'Tem a certeza que pretende apagar este item?') ?>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <?= Yii::t('app', 'Cancelar'); ?>
                </button>
                <button class="btn btn-danger" type="submit">
                    <?= Yii::t('app', 'Ok'); ?>
                </button>
            </div>
        </div>

    </div>
</div>

<?php ActiveForm::end(); ?>
<script>
    $('#form-delete').submit(function() {
        $('#delete_modal').modal('hide');
    });
    
    $('.btn-delete').on('click', function() {
        url = "delete?id=" + $(this).data('id');

        if ($(this).data('url')) {
            url = "<?=Url::base(true)?>" + $(this).data('url') + '?id=' + $(this).data('id');
        }

        $('#form-delete').attr('action', url);
    });

    $('.btn-delete-image').on('click', function() {
        $('#form-delete').attr('action', $(this).data('url') );
    });
</script>
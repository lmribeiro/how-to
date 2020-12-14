<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

?>

<!-- Modal -->
<div id="question_modal" class="modal fade" role="dialog" arian-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-md">

        <?php
        $form = ActiveForm::begin([
                    'id' => 'form-question',
                    'action' => Url::to(['send-faq']) 
        ]);

        ?>

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title"><?= Yii::t('app', 'Enviar Questão') ?></h5>
                <button class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label><?= Yii::t('app', 'Email'); ?> *</label>
                    <?=
                    Html::input(
                            'email', 'email', '', ['class' => 'form-control required', 'placeholder' => Yii::t('app', 'Obrigatório')]
                    )

                    ?>
                </div>

                <div class="form-group">
                    <label><?= Yii::t('app', 'Questão'); ?> *</label>
                    <?=
                    Html::textarea(
                            'question', '', ['class' => 'form-control', 'placeholder' => Yii::t('app', 'Obrigatória')]
                    )

                    ?>
                </div>

            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="submit">
                    <?= Yii::t('app', 'Enviar'); ?>
                </button>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

<script>
    $('#form-question').submit(function (e) {
        $('#question_modal').modal('hide');
    });
</script>

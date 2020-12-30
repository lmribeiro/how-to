<?php

use app\models\Settings;

$terms =  Settings::find()->where(['key' => 'terms' ])->one();
?>

<!-- Modal -->
<div id="terms_modal" class="modal fade" role="dialog" arian-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title"><?= Yii::t('app', 'Condições de Utilização') ?></h5>
                <button class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="card">

                    <div class="card-body">
                        <p><?=$terms->value?></p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

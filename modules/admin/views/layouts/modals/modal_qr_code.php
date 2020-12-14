<?php

use yii\helpers\Html;

?>

<!-- Modal -->
<div id="qr_code_modal" class="modal fade" role="dialog" arian-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">

            <!-- Modal Body -->
            <div class="modal-body">

                <?= Html::img('', ['class' => 'card-img', 'id' => 'img_qr_code', 'style' => 'padding: 5px;background: #fff;']) ?>
                
            </div>
        </div>

    </div>
</div>
<script>

    $('.card-img').on('click', function() {

        if ($(this).data('url')) {
            url = $(this).data('url');
        }
        $('#img_qr_code').attr('src', url);
    });

    
    
</script>

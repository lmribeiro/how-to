<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="step hide">
<div class="card-header">

  <h4 class="mb-2" style="margin-left: 50px;"><?= Html::encode(Yii::t('app', 'Qual é o seu código postal?')); ?></h4>
</div>

<span class="border border-light"></span>
<div class="card-body" >
  <?= $form->field($model, 'address[findzipcode]')->textInput(['maxlength' => true, 'placeholder' => '0000-000'])->label(Yii::t('app', 'Código Postal')); ?>

</div>
<div class="card-footer text-right">
    <div class="form-group">
        <?= Html::button(Yii::t('app', 'Seguinte'), ['class' => 'btn btn-primary mr-1', 'step' => '1']); ?>
    </div>
</div>
</div>
<script>
$(function() {
  $('#<?= $defaultName; ?>-address-findzipcode').on('blur',function(){
    $.ajax({
            type: "POST",
            url: "<?= URL::to(['address/ctt']); ?>",
            async: true,
            data: {code: escape($(this).val())},
            success: function (result) {

                if (result.error) {
                    console.log(result.message);

                } else {

                    (['street','city','district']).forEach( function(val){
                      if($('#<?=$defaultName; ?>-address-'+val).attr('data-select2-id')){
                        $('#<?=$defaultName; ?>-address-'+val).select2('destroy').select2({
                          data: result[val].map(function(e){return {id:e,text:e} })
                        }).attr('style','width: 100%;')
                      }

                    } )
                    $('#<?=$defaultName; ?>-address-postal_code').val(result.postal_code)
                    var latlng =result.gps.split(',')
                    console.log('latlng',latlng)
                    $('#lat').val(latlng[0])
                    $('#lng').val(latlng[1])

                       reload()
                }
            },
            error: function (data) {
                console.log('ajax loading error...');
            }
    });
  });

})
</script>
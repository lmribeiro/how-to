<?php

use yii\helpers\Html;
use app\widgets\Map;

?>

<div class="step hide">
<div class="card-header">
  <h4 class="mb-2" style="margin-left: 50px;"><?= Html::encode(Yii::t('app', 'Qual a sua localização?')); ?></h4>
</div>

<span class="border border-light"></span>
<div class="card-body" >
  <div class="row">
    
    <?= $form->field($model, 'address[lat]', ['options' => ['class' => 'col-6 form-group']])->textInput(['id' => 'lat', 'maxlength' => true])->label(Yii::t('app', 'Latitude')); ?>
    <?= $form->field($model, 'address[lng]', ['options' => ['class' => 'col-6 form-group']])->textInput(['id' => 'lng', 'maxlength' => true])->label(Yii::t('app', 'Longitude')); ?>
  </div>  
  <?= $form->field($model, 'address')->widget(Map::classname(), ['id' => 'my_map'])->label(''); ?>
  <?php include __DIR__.'/mapsjs.php'; ?>   

</div>
<div class="card-footer text-right">
    <div class="form-group">
        <?= Html::button(Yii::t('app', 'Seguinte'), ['class' => 'btn btn-primary mr-1', 'step' => '1']); ?>
    </div>
</div>
</div>
 
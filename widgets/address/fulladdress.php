<?php
use kartik\select2\Select2;
use yii\helpers\Html;

$empty = [
    'data' => [],
    'options' => [
        'multiple' => false,
        'placeholder' => Yii::t('app', 'Selecione uma opção'),
    ],
];
?>

<div class="step hide">
<div class="card-header">
  
  <h4 class="mb-2" style="margin-left: 50px;"><?= Html::encode(Yii::t('app', 'Qual a sua localização?')); ?></h4>
</div>

<span class="border border-light"></span>
<div class="card-body" >
    <div class="row">
        <?= $form->field($model, 'address[door]', ['options' => ['class' => 'col-6 form-group']])->textInput(['maxlength' => true])->label(Yii::t('app', 'Nº Porta')); ?>
        <?= $form->field($model, 'address[floor]', ['options' => ['class' => 'col-6 form-group']])->textInput(['maxlength' => true])->label(Yii::t('app', 'Andar')); ?>
      
    </div>
    <?= $form->field($model, 'address[street]')->widget(Select2::classname(), $empty)->label(Yii::t('app', 'Rua')); ?>    
    <?= $form->field($model, 'address[city]')->widget(Select2::classname(), $empty)->label(Yii::t('app', 'Cidade')); ?>
    <?= $form->field($model, 'address[district]')->widget(Select2::classname(), $empty)->label(Yii::t('app', 'Distrito')); ?>
    <?= $form->field($model, 'address[postal_code]')->textInput(['maxlength' => true])->label(Yii::t('app', 'Código Postal')); ?>

</div>
<div class="card-footer text-right">
    <div class="form-group">
        <?= Html::button(Yii::t('app', 'Seguinte'), ['class' => 'btn btn-primary mr-1', 'step' => '1']); ?>
    </div>
</div>
</div>
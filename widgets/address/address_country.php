<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Country;
use yii\helpers\Html;

?>

<div class="step hide">
  <div class="card-header">
    
    <h4 class="mb-2" style="margin-left: 50px;"><?= Html::encode(Yii::t('app', 'Qual a sua localização?')); ?></h4>
  </div>

  <div class="card-body" >
    <?= $form->field($model, 'country')->widget(Select2::classname(), [
      'value' => $model->country,
      'data' => ArrayHelper::map(Country::find()->all(), 'code', 'name'),
      'options' => [
          'multiple' => false,
          'placeholder' => Yii::t('app', 'Selecione uma opção'),
      ],
      'pluginEvents' => [
        'select2:select' => 'function(e) { var $target=$(e.target); $target.val()=="pt"?stepJump($target,1):stepJump($target,2);}',
        ],
  ]); ?>

  </div>
  <div class="card-footer text-right">
      <div class="form-group">
          <?= Html::button(Yii::t('app', 'Seguinte'), ['class' => 'btn btn-primary mr-1', 'step' => '1']); ?>
      </div>
  </div>
</div>

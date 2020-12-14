<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Validar conta');
?>

<div class="card">
    <div class="card-header">
        <h4><?= $this->title; ?></h4>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="card-body">

        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'readonly' => true]); ?>
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]); ?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]); ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Continuar'), ['class' => 'btn btn-primary btn-lg btn-block', 'type' => 'submit']); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="text-muted text-center">
    <?= Html::a(Yii::t('app', 'Ir para o Login'), '/admin/auth/login'); ?>
</div>
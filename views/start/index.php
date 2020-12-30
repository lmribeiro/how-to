<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Criar conta de administrador');

?>

<div class="card">
    <div class="card-header">
        <h4><?= $this->title; ?></h4>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="card-body">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]); ?>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]); ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Criar'), ['class' => 'btn btn-primary btn-lg btn-block', 'type' => 'submit', 'id' => 'register-btn']); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <br/>
</div>



<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Login');

?>

<div class="card">
    <div class="card-header">
        <h4><?= $this->title; ?></h4>
    </div>

    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'emailusername')->textInput(['autofocus' => true, 'class' => ['form-control']]); ?>

            <?= $form->field($model, 'password')->passwordInput(); ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class= \"custom-control custom-checkbox\">{input}\n <label class=\"custom-control-label\"{label}</label> </div>",
                'class' => 'custom-control-input',
            ]); ?>

            <div class="form-group">
                <?= Html::submitButton($this->title, ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']); ?>
            </div>

            <div class="form-group text-center mb-0">
                <?= Html::a(Yii::t('app', 'Recuperar Password'), '/auth/reset-password', ['class' => 'text-small']); ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

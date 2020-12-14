<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Recuperar Password');

?>

<div class="card">
    <div class="card-header">
        <h4><?= $this->title; ?></h4>
    </div>

    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'password')->passwordInput(); ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Definir'), ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']); ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<div class="text-muted text-center">
    <?= Html::a(Yii::t('app', 'Ir para o Login'), '/admin/auth/login'); ?>
</div>
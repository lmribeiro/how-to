<?php

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FaqCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="card-body">
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
</div>

<?php include __DIR__ . '../../_save.php'; ?>
<?php ActiveForm::end(); ?>
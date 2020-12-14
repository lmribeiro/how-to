<?php

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */
/* @var $form yii\widgets\ActiveForm */

?>

<?php $form = ActiveForm::begin(); ?>
<div class="card-body">
	<?php if (in_array(Yii::$app->user->identity->role, ['ADMIN'])) { ?>
		<?php include __DIR__ . '/_forms/_admin.php'; ?>
	<?php } ?>
	<div class="row">
		<div class="col-12">
			<?= $form->field($model, 'username')->textInput(['maxlength' => true]); ?>
		</div>
		<div class="col-12">
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]); ?>
		</div>
		<div class="col-12">
			<?= $form->field($model, 'email')->textInput(['maxlength' => true, 'type' => 'email']); ?>
		</div>
	</div>
</div>
<div class="float">
	<?php include __DIR__ . '../../_save.php'; ?>
</div>
<?php ActiveForm::end(); ?>
<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Faq */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="card-body">
	<?= $form->field($model, 'faq_category_id')->widget(Select2::className(), [
		'data' => ArrayHelper::map($faq_categories, 'id', 'name'),
		'options' => [
			'placeholder' => Yii::t('app', 'Selecione uma opção'),
		],
	]) ?>

	<?= $form->field($model, 'question')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>
</div>

<?php include __DIR__ . '../../_save.php'; ?>
<?php ActiveForm::end(); ?>
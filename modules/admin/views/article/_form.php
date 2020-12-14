<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="card-body">
	<?= $form->field($model, 'article_category_id')->widget(Select2::className(), [
		'data' => ArrayHelper::map($article_categories, 'id', 'name'),
		'options' => [
			'placeholder' => Yii::t('app', 'Selecione uma opção'),
		],
	]) ?>

	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'status')->dropDownList(['DRAFT' => 'DRAFT', 'REVIEW' => 'REVIEW', 'PENDING' => 'PENDING', 'PUBLISHED' => 'PUBLISHED', 'ARCHIVED' => 'ARCHIVED',], ['prompt' => '']) ?>

</div>

<?php include __DIR__ . '../../_save.php'; ?>
<?php ActiveForm::end(); ?>
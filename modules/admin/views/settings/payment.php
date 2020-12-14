<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\models\Settings */

$this->title = Yii::t('app', 'Pagamentos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Definições'), 'url' => ['settings/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?php $form = ActiveForm::begin(); ?>
<div class="card">
	<div class="card-header">
		<h4><?= Html::encode($this->title) ?></h4>
	</div>

	<div class="card-body">
		<h5 class="section-title"><?= Yii::t('app', 'Definições SIBS') ?></h5>

		<?=
			$form->field($model, 'sibs_live_mode')->widget(SwitchInput::className(), [
				'pluginOptions' => [
					'onText' => Yii::t('app', 'Não'),
					'offText' => Yii::t('app', 'Sim'),
					'onColor' => 'default',
					'offColor' => 'primary',
				]
			])

		?>
	</div>

	<div class="float">
		<?php include __DIR__ . '../../_save.php'; ?>
	</div>
</div>
<?php ActiveForm::end(); ?>

<?php if (Yii::$app->session->get('my_theme')) : ?>
	<?php include __DIR__ . '../../_ckeditor.php'; ?>
<?php endif; ?>
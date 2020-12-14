<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Merchant;

?>
<div class="row">
	<div class="col">
		<?=
			$form->field($model, 'role')->widget(Select2::classname(), [
				'data' => [
					'ADMIN' => Yii::t('app', 'Administrador'),
					'MERCHANT' => Yii::t('app', 'Comerciante')
				],
				'hideSearch' => true,
				'options' => [
					'value' => $model->role,
					'multiple' => false,
					'placeholder' => Yii::t('app', 'Selecione uma opção'),
				],
				'pluginEvents' => [
					'change' => "function() { 
                    id = $(this).val();
                    if(id == 'MERCHANT') {
                        $('#merchant-select').show();
                    } else {
                        $('#merchant-select').hide();
                    }
                 }",
				],
			]);

		?>
	</div>
	<div class="col">
		<div id="merchant-select" style="display: none">
			<?=
				$form->field($model, 'merchant_id')->widget(Select2::classname(), [
					'data' => ArrayHelper::map(Merchant::find()->where(['status' => 1, 'deleted' => 0])->all(), 'id', 'name'),
					'options' => [
						'value' => $model->merchant_id,
						'multiple' => false,
						'placeholder' => Yii::t('app', 'Selecione uma opção'),
					],
				]);

			?>
		</div>
	</div>
</div>
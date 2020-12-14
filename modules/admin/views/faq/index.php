<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\faqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Questões');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'FAQs'), 'url' => ['faqs']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['modals'][] = 'modal';
?>
<div class="card">
	<div class="card-header">
		<h4><?= Html::encode($this->title) ?></h4>
		<div class="card-header-action">
			<?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Nova'), ['create'], ['class' => 'btn btn-icon icon-left btn-success']); ?>
		</div>
	</div>

	<div class="card-body">

		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'columns' => [
				[
					'attribute' => 'faq_category_id',
					'value' => function ($model) {
						return $model->faqCategory->name;
					},
					'filter' => ArrayHelper::map($faq_categories, 'id', 'name'),
					'filterInputOptions' => ['placeholder' => Yii::t('app', 'Todas')],
					'filterWidgetOptions' => [
						'pluginOptions' => [
							'allowClear' => true,
							'dropdownAutoWidth' => true,
							'containerCss' => [
								'padding-right' => '50px'
							]
						],
					],
					'filterType' => GridView::FILTER_SELECT2,
				],
				'question',
				$actionCol = Yii::$app->params['actions'](['template' => '{view}{update}{delete}']),
			],
		]); ?>
	</div>
</div>

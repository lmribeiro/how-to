<?php

use yii\helpers\Html;
use yii\helpers\Url;

return [
	'adminEmail' => 'omenu@omenu.online',
	'user.passwordResetTokenExpire' => 3600,
	'bsVersion' => '4.x', // this will set globally `bsVersion` to Bootstrap 4.x for all Krajee Extensions
	'actions' => function ($attributes) {
		$col = Yii::$app->params['actionCol'];
		foreach ($attributes as $key => $value) {
			$col[$key] = $value;
		}
		$col['header'] = Yii::t('app', 'Ações');
		return $col;
	},
	'actionCol' => [
		'class' => 'yii\grid\ActionColumn',
		'headerOptions' => ['class' => 'text-center'],
		'template' => '{view}{update}{delete}',
		'buttons' => [
            'view' => function ($url) {
                return Html::tag('span', Html::a('<i class="fa fa-fw fa-eye"></i>', $url, ['class' => 'btn btn-info btn-action']), ['data-toggle' => 'tooltip', 'data-title' => Yii::t('app', 'Ver')]);
            },
			'update' => function ($url) {
				return Html::tag('span', Html::a('<i class="fas fa-fw fa-pencil-alt"></i>', $url, ['class' => 'btn  btn-action btn-warning']), ['data-toggle' => 'tooltip', 'data-title' => Yii::t('app', 'Editar')]);
			},
            'delete' => function ($url, $model) {
                $action = explode('?', $url);
                return Html::tag('span', Html::a('<i class="fas fa-fw fa-trash"></i>', '#', ['class' => 'btn btn-action btn-delete btn-danger', 'data-url' => array_shift($action), 'data-id' => isset($model->id) ? $model->id : (isset($model->code) ? $model->code : $model->key), 'data-toggle' => 'modal', 'data-target' => '#delete_modal']), ['data-toggle' => 'tooltip', 'data-title' => Yii::t('app', 'Apagar')]);
            }
		],
		'urlCreator' => function ($action, $data) {
			return Url::to([Yii::$app->controller->id . "/$action", 'id' => isset($data->id) ? $data->id : (isset($data->code) ? $data->code : $data->key)]);
		},
	],
	'ckeditorConfig' => ['preset' => 'advance'],
	'ckeditorSimpleConfig' => [
		'preset' => 'custom',
		'clientOptions' => [
			'toolbarGroups' => [
				['name' => 'basicstyles', 'groups' => ['styles', 'basicstyles', 'cleanup']],
				['name' => 'links', 'groups' => ['links', 'insert']],
			],
		],
	],
	'languages' => ['English' => 'en', 'Português' => 'pt'],
	'subHeader' => '',
	'filterWidgetOptions' => [
		'pluginOptions' => [
			'allowClear' => true,
			'dropdownAutoWidth' => true,
			'containerCss' => [
				'padding-right' => '35px'
			]
		],
	]
];

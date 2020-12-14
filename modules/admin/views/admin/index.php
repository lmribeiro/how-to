<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Administradores');
$this->params['breadcrumbs'][] = $this->title;
$this->params['modals'][] = 'modal';

?>
<div class="card">

    <div class="card-header">
        <h4><?= Html::encode($this->title); ?></h4>
        <div class="card-header-action">
            <?= Html::a('<i class="fas fa-plus"></i> '.Yii::t('app', 'Novo'), ['create'], ['class' => 'btn btn-success']); ?>
        </div>
    </div>

    <div class="card-body">
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'name',
                'email:email',
                [
                    'attribute' => 'role',
                    'label' => Yii::t('app', 'Perfíl'),
                    'format' => 'raw',
                    'visible' => Yii::$app->user->identity->role == 'ADMIN',
                    'value' => function ($model) {
                        switch ($model->role) {
                            case "MERCHANT":
                                return Yii::t('app', 'Comerciante');
                            default:
                                return Yii::t('app', 'Administrador');
                        }
                    },
                    'filterInputOptions' => ['placeholder' => Yii::t('app', 'Todos')],
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
                    'filter' => [
                        'ADMIN' => Yii::t('app', 'Administrador'),
                        'MERCHANT' => Yii::t('app', 'Comerciante'),
                    ],
                ],
                [
                    'attribute' => 'role',
                    'label' => Yii::t('app', 'Perfíl'),
                    'format' => 'raw',
                    'visible' => Yii::$app->user->identity->role == 'CAMARA',
                    'value' => function ($model) {
                        switch ($model->role) {
                            case "MERCHANT":
                                return Yii::t('app', 'Comerciante');
                        }
                    },
                    'filterInputOptions' => ['placeholder' => Yii::t('app', 'Todos')],
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
                    'filter' => [
                        'MERCHANT' => Yii::t('app', 'Comerciante'),
                    ],
                ],
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'filter' => app\models\Admin::getStatusList(),
                    'value' => 'statusLabel',
                    'filterInputOptions' => ['placeholder' => Yii::t('app', 'Todos')],
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
                $actionCol = Yii::$app->params['actions']([
            'template' => '{view}{update}{delete}'
                ]),
            ],
        ]);

        ?>
    </div>
</div>
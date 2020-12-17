<?php

use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Artigos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Knowledge Base'), 'url' => ['knowledge-base/index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['modals'][] = 'modal';

?>
<div class="card">
    <div class="card-header">
        <h4><?= Html::encode($this->title) ?></h4>
        <div class="card-header-action">
            <?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Novo'), ['create'], ['class' => 'btn btn-icon icon-left btn-success']); ?>
        </div>
    </div>

    <div class="card-body">
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'article_category_id',
                    'value' => function ($model) {
                        return $model->articleCategory->name;
                    },
                    'filter' => ArrayHelper::map($article_categories, 'id', 'name'),
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
                'title',
                'views',
                'up_votes',
                'down_votes',
                [
                    'attribute' => 'status',
                    'label' => Yii::t('app', 'Estado'),
                    'format' => 'raw',
                    'value' => function ($model) {
                        switch ($model->status) {
                            case "ARCHIVED":
                                return Yii::t('app', 'Arquivado');
                            case "DRAFT":
                                return Yii::t('app', 'Rascunho');
                            case "PENDING":
                                return Yii::t('app', 'Pendente');
                            case "PUBLISHED":
                                return Yii::t('app', 'Publicado');
                            default:
                                return Yii::t('app', 'Em Revisão');
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
                        'ARCHIVED' => Yii::t('app', 'Arquivado'),
                        'REVIEW' => Yii::t('app', 'Em Revisão'),
                        'PENDING' => Yii::t('app', 'Pendente'),
                        'PUBLISHED' => Yii::t('app', 'Publicado'),
                        'DRAFT' => Yii::t('app', 'Rascunho'),
                    ],
                ],
                $actionCol = Yii::$app->params['actions'](['template' => '{view}{update}{delete}']),
            ],
        ]);

        ?>
    </div>
</div>

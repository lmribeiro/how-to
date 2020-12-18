<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Knowledge Base'), 'url' => ['knowledge-base/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artigos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['modals'][] = 'modal';
\yii\web\YiiAsset::register($this);
?>
<div class="card">

    <div class="card-header">
        <h4><?= Html::encode($this->title) ?></h4>
        <div class="card-header-action">
            <?= Html::a('<i class="fas fa-edit"></i> ' . Yii::t('app', 'Editar'), ['update', 'id' => $model->id], ['class' => 'btn btn-icon icon-left btn-warning']); ?>
            <?= Html::a('<i class="fas fa-trash"></i> ' . Yii::t('app', 'Apagar'), '#', ['class' => 'btn btn-icon icon-left btn-danger btn-delete', 'data-id' => $model->id, 'data-toggle' => 'modal', 'data-target' => '#delete_modal']); ?>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
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
                        ],
                        [
                            'attribute' => 'article_category_id',
                            'value' => $model->articleCategory->name
                        ],
                        'title',
                        'views',
                    ],
                ]) ?>
            </div>
            <div class="col-12 col-lg-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'up_votes',
                        'down_votes',
                        'created_at',
                        'updated_at',
                    ],
                ]) ?>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-12 pl-4 pr-4">
                <h5>Texto</h5>

                <?= $model->text ?>
            </div>
        </div>

    </div>
</div>

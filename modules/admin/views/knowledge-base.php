<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Knowledge Base');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="card">
    <div class="card-header">
        <h4><?= Html::encode($this->title) ?></h4>
        <div class="card-header-action">
            <?= Html::a(Yii::t('app', 'Ver').' <i class="fas fa-external-link-alt"></i>', ['/kb'], ['class' => 'text-uppercase', 'target' => '_new']) ?>
        </div>
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="far    fa-file-alt"></i>
                    </div>
                    <div class="card-body">
                        <h4><?= Yii::t('app', 'Artigos'); ?></h4>
                        <p><?= Yii::t('app', 'Entradas na Knowledge Base') ?></p>
                        <?= Html::a('<i class="fas fa-eye"></i> '.Yii::t('app', 'Ver'), ['article/index'], ['class' => 'card-cta']) ?>
                        <?= Html::a('<i class="fas fa-plus"></i> '.Yii::t('app', 'Novo'), ['article/create'], ['class' => 'card-cta']) ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="far fa-list-alt"></i>
                    </div>
                    <div class="card-body">
                        <h4><?= Yii::t('app', 'Categorias'); ?></h4>
                        <p><?= Yii::t('app', 'Categorias dos artigos') ?></p>
                        <?= Html::a('<i class="fas fa-eye"></i> '.Yii::t('app', 'Ver'), ['article-category/index'], ['class' => 'card-cta']) ?>
                        <?= Html::a('<i class="fas fa-plus"></i> '.Yii::t('app', 'Nova'), ['article-category/create'], ['class' => 'card-cta']) ?>
                    </div>
                </div>
            </div>

            <!-- Address -->
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-tags"></i>
                    </div>
                    <div class="card-body">
                        <h4><?= Yii::t('app', 'Tags'); ?></h4>
                        <p><?= Yii::t('app', 'Tags dos artigos') ?></p>
                        <?= Html::a('<i class="fas fa-eye"></i> '.Yii::t('app', 'Ver'), ['article-tags/index'], ['class' => 'card-cta']) ?>
                        <?= Html::a('<i class="fas fa-plus"></i> '.Yii::t('app', 'Nova'), ['article-tags/create'], ['class' => 'card-cta']) ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

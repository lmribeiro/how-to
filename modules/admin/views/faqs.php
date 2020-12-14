<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'FAQs');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="card">
    <div class="card-header">
        <h4><?= Html::encode($this->title) ?></h4>
        <div class="card-header-action">
            <?= Html::a(Yii::t('app', 'Ver').' <i class="fas fa-external-link-alt"></i>', ['/site/faq'], ['class' => 'text-uppercase', 'target' => 'new']) ?>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <div class="card-body">
                        <h4><?= Yii::t('app', 'Questões'); ?></h4>
                        <p><?= Yii::t('app', 'Questões e respostas') ?></p>
                        <?= Html::a('<i class="fas fa-eye"></i> '.Yii::t('app', 'Ver'), ['faq/index'], ['class' => 'card-cta']) ?>
                        <?= Html::a('<i class="fas fa-plus"></i> '.Yii::t('app', 'Nova'), ['faq/create'], ['class' => 'card-cta']) ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-th-list"></i>
                    </div>
                    <div class="card-body">
                        <h4><?= Yii::t('app', 'Categorias'); ?></h4>
                        <p><?= Yii::t('app', 'Categorias das perguntas frequentes') ?></p>
                        <?= Html::a('<i class="fas fa-eye"></i> '.Yii::t('app', 'Ver'), ['faq-category/index'], ['class' => 'card-cta']) ?>
                        <?= Html::a('<i class="fas fa-plus"></i> '.Yii::t('app', 'Nova'), ['faq-category/create'], ['class' => 'card-cta']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

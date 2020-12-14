<?php

use yii\helpers\Html;

?>

<!-- Address -->
<div class="col-lg-6">
    <div class="card card-large-icons">
        <div class="card-icon bg-primary text-white">
            <i class="fas fa-map-marked-alt"></i>
        </div>
        <div class="card-body">
            <h4><?= Yii::t('app', 'Moradas'); ?></h4>
            <p><?= Yii::t('app', 'Países, Distritos, Cidades e Códigos Postais') ?></p>
            <?= Html::a('<i class="fas fa-chevron-right"></i> ' . Yii::t('app', 'Países'), ['country/index'], ['class' => 'card-cta']) ?>
            <?= Html::a('<i class="fas fa-chevron-right"></i> ' . Yii::t('app', 'Distritos'), ['district/index'], ['class' => 'card-cta']) ?>
            <?= Html::a('<i class="fas fa-chevron-right"></i> ' . Yii::t('app', 'Cidades'), ['city/index'], ['class' => 'card-cta']) ?>
            <?= Html::a('<i class="fas fa-chevron-right"></i> ' . Yii::t('app', 'Códigos Postais'), ['postal-code/index'], ['class' => 'card-cta']) ?>
        </div>
    </div>
</div>
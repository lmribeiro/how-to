<?php

use yii\helpers\Html;

?>

<!-- General -->
<div class="col-lg-6">
    <div class="card card-large-icons">
        <div class="card-icon bg-primary text-white">
            <i class="fas fa-store"></i>
        </div>
        <div class="card-body">
            <h4><?= Yii::t('app', 'Dados comerciais'); ?></h4>
            <p><?= Yii::t('app', 'Dados comercias da empresa.') ?></p>
            <?= Html::a('<i class="fas fa-edit"></i> ' . Yii::t('app', 'Editar'), ['merchant/update', 'id' => Yii::$app->user->identity->merchant_id], ['class' => 'card-cta']) ?>
        </div>
    </div>
</div>
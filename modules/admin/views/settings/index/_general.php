<?php

use yii\helpers\Html;

?>

<!-- General -->
<div class="col-lg-6">
    <div class="card card-large-icons">
        <div class="card-icon bg-primary text-white">
            <i class="fas fa-cogs"></i>
        </div>
        <div class="card-body">
            <h4><?= Yii::t('app', 'Gerais'); ?></h4>
            <p><?= Yii::t('app', 'Emails e Condições de Utilização') ?></p>
            <?= Html::a('<i class="fas fa-edit"></i> ' . Yii::t('app', 'Editar'), ['settings/backoffice'], ['class' => 'card-cta']) ?>
        </div>
    </div>
</div>
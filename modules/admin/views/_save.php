<?php

use yii\helpers\Html;
?>
<div class="card-footer text-right">
    <div class="form-group">
        <?= Html::a(Yii::t('app', 'Cancelar'), Yii::$app->request->referrer, ['class' => 'btn btn-outline-warning']) ?>
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success', 'type' => 'submit']); ?>
    </div>
</div>
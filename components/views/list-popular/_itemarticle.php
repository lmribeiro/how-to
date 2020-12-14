<?php

use yii\helpers\Html;
?>
<?= Html::a(Html::encode($model->title), ['article/view', 'id' => $model->id], ['class' => 'list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center', 'style' => 'border: 0; border-radius: 4px;']) ?>
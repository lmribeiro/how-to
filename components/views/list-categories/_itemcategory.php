<?php

use yii\helpers\Html;

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
$id = null;
if ($controller == 'category' && $action == 'view') {
	$id = Yii::$app->controller->actionParams['id'];
}
?>
<?= Html::a(Html::encode($model->name) . '<span class="badge badge-light badge-pill">' . count($model->articles) . '</span>', ['category/view', 'id' => $model->id], ['class' => 'list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center' . ($id == $model->id ? ' active' : ' text-dark'), 'style' => 'border: 0; border-radius: 4px;']) ?>
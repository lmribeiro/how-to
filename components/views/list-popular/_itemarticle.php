<?php

use app\models\Article;
use yii\helpers\Html;
?>
<?= /** @var Article $model */
Html::a(Html::encode($model->title) . '<span>' . $model->up_votes . ' <i class="fa fa-grin text-success"></i></span>', ['category/view', 'id' => $model->id], ['class' => 'list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center', 'style' => 'border: 0; border-radius: 4px;']) ?>

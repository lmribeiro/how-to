<?php

use app\models\Article;
use yii\helpers\Html;
?>
<?= /** @var Article $model */
Html::a(Html::encode($model->excerpt('title', 35)) . '<span>' . $model->up_votes . ' <i class="fa fa-grin text-success"></i></span>', ['article/view', 'id' => $model->id, 'slug' => $model->getSlug()], ['class' => 'list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center', 'style' => 'border: 0; border-radius: 4px;']) ?>

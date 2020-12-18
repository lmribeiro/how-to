<?php

use app\models\Article;
use yii\widgets\ListView;

/** @var Article[] $articleProvider */

?>
<?=
ListView::widget([
    'dataProvider' => $articleProvider,
    'options' => ['class' => 'list-group'],
    'summary' => '',
    'itemView' => '_itemarticle',
    'itemOptions' => ['tag' => false]
]) ?>

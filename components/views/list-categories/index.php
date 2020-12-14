<?php

use yii\widgets\ListView;

?>
<?= ListView::widget([
    'dataProvider' => $categoryProvider,
    'options' => ['class' => 'list-group'],
    'summary' => '',
    'itemView' => '_itemcategory',
    'itemOptions' => ['tag' => false]
]) ?>
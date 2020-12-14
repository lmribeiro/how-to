<?php

use yii\widgets\ListView;

?>
<?= ListView::widget([
    'dataProvider' => $articleProvider,
    'options' => ['class' => 'list-group'],
    'summary' => '',
    'itemView' => '_itemarticle',
    'itemOptions' => ['tag' => false]
]) ?>
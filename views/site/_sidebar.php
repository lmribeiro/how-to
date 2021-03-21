<?php

use app\models\ArticleCategory;
use yii\widgets\ListView;

/** @var ArticleCategory[] $categoryProvider */
?>
<div class="card">
    <div class="card-header">
        <h4><?= Yii::t('app', 'Categorias') ?></h4>
    </div>
    <div class="card-body">
        <?= ListView::widget([
            'dataProvider' => $categoryProvider,
            'options' => ['class' => 'list-group'],
            'summary' => '',
            'itemView' => '_itemcategory',
            'itemOptions' => ['tag' => false]
        ]) ?>
    </div>
</div>

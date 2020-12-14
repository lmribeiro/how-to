<?php

use app\models\Article;

/** @var $articles Article[] */

$this->title = Yii::t('app', 'Knowledge Base');

?>

<section class="section">
    <h4 class="section-title"><?= Yii::t('app', 'Últimos artigos') ?></h4>
    <?php if ($articles) : ?>
        <?php include __DIR__ . '/../_articles.php'; ?>
    <?php else : ?>
        <div class="card">
            <div class="card-header">
                <?= Yii::t('app', 'Não existem artigos') ?>
            </div>
        </div>
    <?php endif; ?>
</section>

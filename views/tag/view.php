<?php

use app\models\Article;
use app\models\ArticleTags;
use yii\data\Pagination;
use \yii\web\View;

/** @var View $this */
/** @var Article $articles */
/** @var Pagination $pages */
/** @var ArticleTags $model */

$this->title = Yii::t('app', 'Tag') . ": " . $model->{"name"};
$this->params['breadcrumbs'][] = $this->title;

?>

<section class="section">
    <h4 class="section-title"><?= Yii::t('app', 'Artigos') ?></h4>
    <?php if ($articles) : ?>
        <?= $this->render('/_articles', ['articles' => $articles, 'pages' => $pages]); ?>
    <?php else : ?>
        <div class="card">
            <div class="card-header">
                <?= Yii::t('app', 'Não existem artigos') ?>
            </div>
        </div>
    <?php endif; ?>
</section>

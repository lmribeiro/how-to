<?php

use app\models\Article;
use yii\bootstrap4\LinkPager;
use yii\data\Pagination;
use yii\helpers\Html;

/** @var Article[] $articles */
/** @var Pagination $pages */

?>

<?php foreach ($articles as $article) : ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h5 class="mb-1">
                        <?= Html::a($article->title, ['article/view', 'id' => $article->id, 'slug' => $article->getSlug()], ['class' => '']) ?>
                    </h5>
                </div>
                <div class="col-12">
                    <small><b><?= Yii::t('app', 'Data') ?>
                            :</b> <?= Yii::$app->formatter->asDate($article->created_at, 'd-MM-Y') ?></small> |
                    <small><b><?= Yii::t('app', 'Categoria') ?>:</b> <?= $article->articleCategory->name ?></small>
                </div>
            </div>
        </div>
        <div class="card-body">
            <p><?= $article->excerpt() ?></p>
            <?php if ($article->articleTags) { ?>
                <br/>
                <p><b>TAGS:</b>
                    <?php foreach ($article->articleTags as $tag) : ?>
                        <?= Html::a($tag->name, ['tag/view', 'id' => $tag->id], ['class' => 'badge badge-light', 'style' => 'margin-top: -4px;']) ?>
                    <?php endforeach; ?>
                </p>
            <?php } ?>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-6">
                    <p><i class="fa fa-grin text-success"></i> <?= $article->up_votes ?></p>
                </div>
                <div class="col-6 text-right">
                    <?= Html::a(Yii::t('app', 'Ler mais'), ['article/view', 'id' => $article->id, 'slug' => $article->getSlug()], ['class' => 'btn btn-outline-secondary']) ?>
                </div>
            </div>
        </div>
    </div>
    <?= Html::endTag('a'); ?>
<?php endforeach; ?>
<div class="text-center">
    <?php
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>
</div>


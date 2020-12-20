<?php

use app\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var Article $model */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => $model->articleCategory->{'name'}, 'url' => ['category/view', 'id' => $model->articleCategory->id]];
$this->params['breadcrumbs'][] = $this->title;

?>
<section class="section">
    <h4 class="section-title"><?= $model->title ?></h4>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <small><b><?= Yii::t('app', 'Data') ?>
                            :</b> <?= Yii::$app->formatter->asDate($model->created_at, 'd-MM-Y') ?></small> |
                    <small><b><?= Yii::t('app', 'Categoria') ?>:</b> <?= $model->articleCategory->name ?></small> |
                    <small><?= $model->up_votes ?> <i class="fa fa-grin text-success"></i></small> |
                    <small><?= $model->down_votes ?> <i class="fa fa-meh-rolling-eyes text-danger"></i></small>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?= $model->text ?>
        </div>
        <div class="card-footer">
            <?php if ($model->articleTags) { ?>
                <br/>
                <p><b>TAGS:</b>
                    <?php foreach ($model->articleTags as $tag) : ?>
                        <small>
                            <?= Html::a($tag->{"name"}, ['tag/view', 'id' => $tag->id], ['class' => 'badge badge-light', 'style' => 'margin-top: -4px;']) ?>
                        </small>
                    <?php endforeach; ?>
                </p>
            <?php } ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6><?= Yii::t('app', 'Qual a tua opinião sobre o artigo?') ?></h6>
        </div>
        <div class="card-body">
            <div id="vote" class="d-flex justify-content-center">
                <?= Html::a('<i class="fa fa-grin fa-3x"></i><br>' . Yii::t('app', 'Ajudou'), ['/'], ['class' => 'btn btn-lg btn-link text-success', 'id' => 'vote-up']) ?>
                <?= Html::a('<i class="fa fa-meh-rolling-eyes fa-3x"></i><br>' . Yii::t('app', 'Não ajudou'), ['/'], ['class' => 'btn btn-lg btn-link text-danger', 'id' => 'vote-down']) ?>
            </div>
        </div>
    </div>

    <?php if ($model->relatedArticles()) { ?>
        <section class="section">
            <h4 class="section-title"><?= Yii::t('app', 'Artigos relacionados') ?></h4>
            <div class="card">
                <div class="card-body" style="padding: 20px 0;">
                    <div class="list-group">
                        <?php foreach ($model->relatedArticles() as $related) : ?>
                            <a class="list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center text-dark"
                               href="<?= Url::to(['article/view', 'id' => $related->article->id, 'slug' => $related->article->getSlug()]) ?>"
                               style="border: 0; border-radius: 4px;">
                                <?= $related->article->title ?>
                                <span><?= $related->article->up_votes ?> <i class="fa fa-grin text-success"></i></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</section>
<script>
    $('#vote-up').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: '<?= Url::to(['article/vote-up']) ?>',
            type: 'post',
            data: {
                _csrf: yii.getCsrfToken(),
                id: <?= Yii::$app->controller->actionParams['id'] ?>
            },
            dataType: 'json',
            success: function (response) {
                $("#vote").html('<p><?= Yii::t("app", "Obrigado pela tua opinião!") ?></p>');
            }
        })
    });
    $('#vote-down').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: '<?= Url::to(['article/vote-down']) ?>',
            type: 'post',
            data: {
                _csrf: yii.getCsrfToken(),
                id: <?= Yii::$app->controller->actionParams['id'] ?>
            },
            dataType: 'json',
            success: function (response) {
                $("#vote").html('<p><?= Yii::t("app", "Obrigado pela tua opinião!") ?></p>');
            }
        })
    });
</script>

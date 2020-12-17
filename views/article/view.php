<?php

use yii\helpers\Html;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => $model->articleCategory->{'name'}, 'url' => ['category/view', 'id' => $model->articleCategory->id]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="card" style="margin-top: 34px;">
    <div class="card-header">
        <div class="row">
            <div class="col-12">
                <h5 class="mb-1"><?= $model->{'title'} ?></h5>
            </div>
            <div class="col-12">
                <small><b><?= Yii::t('app', 'Data') ?>
                        :</b> <?= Yii::$app->formatter->asDate($model->created_at, 'd-MM-Y') ?></small> |
                <small><b><?= Yii::t('app', 'Categoria') ?>:</b> <?= $model->articleCategory->{'name'} ?></small>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?= $model->text ?>
    </div>
    <div class="card-footer">
        <br/>
        <p><b>TAGS:</b>
            <?php foreach ($model->articleTags as $tag) : ?>
                <?= Html::a($tag->{"name"}, ['tag/view', 'id' => $tag->id], ['class' => 'badge badge-light', 'style' => 'margin-top: -4px;']) ?>
            <?php endforeach; ?>
        </p>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h6><?= Yii::t('app', 'Qual a opinião sobre o artigo?') ?></h6>
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
            <div class="card-body">
                <ul class="nav flex-column">
                    <?php foreach ($model->relatedArticles() as $article) : ?>
                        <?php $article = $article->article; ?>
                        <li class="nav-item">
                            <?= Html::a($article->{"title"}, ['article/view', 'id' => $article->id]) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
<?php } ?>

<?php
$id = Yii::$app->controller->actionParams['id'];
$msgOk = '<p>' . Yii::t("app", "Obrigado pela sua opinião") . '</p>';

$script = <<< JS
$('#vote-up').click(function(e) {
    e.preventDefault();

    $.ajax({
        url: 'vote-up',
        type: 'post',
        data: {
            _csrf: yii.getCsrfToken(),
            id: $id
        },
        dataType: 'json',
        success: function(response) {
            $("#vote").html("$msgOk");
        }
    })
});
$('#vote-down').click(function(e) {
    e.preventDefault();

    $.ajax({
        url: 'vote-down',
        type: 'post',
        data: {
            _csrf: yii.getCsrfToken(),
            id: $id
        },
        dataType: 'json',
        success: function(response) {
            $("#vote").html("$msgOk");
        }
    })
});
JS;
$this->registerJs($script);

?>

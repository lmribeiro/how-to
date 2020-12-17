<?php

use app\components\ListCategoriesWidget;
use app\components\ListPopularWidget;
use app\components\ListTagsWidget;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->beginContent('@app/views/layouts/base.php');

?>

<div class="jumbotron">
    <div class="container">
        <h1 class="display-3 text-center text-white"><?= Yii::t('app', 'Knowledge Base') ?></h1>
        <div class="search">
            <div class="col-md-8 offset-md-2 text-white">
                <?= $this->render('_search') ?>
            </div>
            <div class="col-md-8 offset-md-2 text-center">
                <br/>
                <a href="#" class="mt-5 text-uppercase text-white">
                    <?= Yii::t('app', 'Ver as FAQs'); ?>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <nav aria-label="breadcrumb">
            <?=
            Breadcrumbs::widget([
                'options' => [
                    'class' => 'breadcrumb',
                ],
                'encodeLabels' => false,
                'homeLink' => [
                    'label' => '<i class="fas fa-graduation-cap"></i> ' . Yii::t('app', 'Knowledge Base'),
                    'url' => Url::to(['/']),
                ],
                'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
                'activeItemTemplate' => '<li class="breadcrumb-item active">{link}</li>',
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]);

            ?>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-8">
            <?= $content ?>
        </div>
        <div class="col-md-4">
            <section class="section">
                <h4 class="section-title"><?= Yii::t('app', 'Categorias') ?></h4>
                <div class="card">
                    <div class="">
                        <?= ListCategoriesWidget::widget() ?>
                    </div>
                </div>
            </section>
            <section class="section">
                <h4 class="section-title"><?= Yii::t('app', 'Mais vistos') ?></h4>
                <div class="card">
                    <div class="">
                        <?= ListPopularWidget::widget() ?>
                    </div>
                </div>
            </section>
            <section class="section">
                <h4 class="section-title"><?= Yii::t('app', 'Tags') ?></h4>
                <div class="card">
                    <div class="card-body">
                        <?= ListTagsWidget::widget() ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>

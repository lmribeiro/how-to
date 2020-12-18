<?php

use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Breadcrumbs;

/** @var View $content */

$this->beginContent('@app/views/layouts/base.php');

?>

<div class="jumbotron" style="padding: 8rem 2rem 6rem">
    <div class="container">
        <h1 class="display-3 text-center text-white"><?= $this->title ?></h1>
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
        <div class="col-md-12">
            <?= $content ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>

<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $exception->statusCode;

?>
<section class="section-header bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <h1 class="display-2 mb-3"><?= $exception->statusCode ?></h1>
                <p class="lead">
                    <?php if ($exception->statusCode == 400) : ?>
                    <h4><?= Yii::t('app', 'Pedido inválido') ?></h4>
                <?php endif; ?>
                <?php if ($exception->statusCode == 403) : ?>
                    <h4><?= Yii::t('app', 'Não tem permissão para aceder a esta página') ?></h4>
                <?php endif; ?>
                <?php if ($exception->statusCode == 404) : ?>
                    <h4><?= Yii::t('app', 'A página solicitada não existe') ?></h4>
                <?php endif; ?>
                <?= Yii::t('app', 'Este erro ocorreu enquanto o servidor Web processava o seu pedido.') ?> <?= Yii::t('app', 'Por favor contacte-nos se achar que é um erro do servidor.') ?>
                </p>
            </div>
        </div>
    </div>
    <div class="container mt-6">
        <div class="row justify-content-center">
            <div class="d-flex align-items-center justify-content-center mb-5">
                <a class="btn btn-secondary animate-up-2" href="<?= Yii::$app->homeUrl ?>">
                    <span class="icon icon-xs mr-3">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <?= Yii::t('app', 'Voltar') ?> 
                </a>
            </div>
        </div>
    </div>
</section>
<?php
/* @var $this View */
/* @var $content string */

use yii\helpers\Url;
use app\widgets\MyAlert;
use app\assets\AppAsset;
use yii\web\View;

AppAsset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
    <head>
        <?php include __DIR__.'/_header.php'; ?>
        <?php $this->head(); ?>
    </head>

    <body class="base skin-reverse">
        <?php $this->beginBody(); ?>
        <?= MyAlert::widget(); ?>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="left: 0">
            <div class="container">
                <a class="navbar-brand" href="<?= Yii::$app->controller->homeUrl ?>">
                    <div class="base-brand" >
                        <h1 class="text-white">
                            HOW-TO
                        </h1>
                    </div>
                </a>

                <div class="collapse navbar-collapse" id="">
                    <div class="d-flex ml-auto">
                        <ul class="navbar-nav navbar-right text-white">

                            <?php if (Yii::$app->user->identity->role != "VIEWER") { ?>
                                <li><a class="btn btn-outline-white">ADICIONAR ARTIGO</a></li>
                           <?php } ?>

                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle menu-toggle nav-link-lg nav-link-user text-white">
                                    <img alt="image" src="<?= Yii::$app->user->identity->getThumb('avatar', 'thumb', true); ?>" class="rounded-circle mr-1">
                                    <div class="d-sm-none d-lg-inline-block"><?= Yii::t('app', 'Olá'); ?> <?= Yii::$app->user->identity->name; ?></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">

                                    <?php foreach (Yii::$app->controller->top_nav as $n) { ?>
                                        <div class="dropdown-title"><?= $n['name']; ?></div>
                                        <?php foreach ($n['items'] as $item) { ?>
                                            <a class="dropdown-item has-icon <?= $item['class']; ?>" href="<?= Url::to([$item['action']]); ?>">
                                                <i class="<?= $item['icon']; ?>"></i>
                                                <?= $item['name']; ?>
                                            </a>
                                        <?php } ?>
                                        <?php $n['divider'] ? '<div class="dropdown-divider"></div>' : ''; ?>
                                    <?php } ?>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main role="main">
            <?= $content; ?>
        </main>

        <footer class="site-footer">
            <div class="container">
                <a id="scroll-up" href="#">
                    <svg style='height: 33px' aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-up" class="svg-inline--fa fa-angle-up fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M177 159.7l136 136c9.4 9.4 9.4 24.6 0 33.9l-22.6 22.6c-9.4 9.4-24.6 9.4-33.9 0L160 255.9l-96.4 96.4c-9.4 9.4-24.6 9.4-33.9 0L7 329.7c-9.4-9.4-9.4-24.6 0-33.9l136-136c9.4-9.5 24.6-9.5 34-.1z"></path></svg>
                </a>

                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <p class="footer-menu">© <?= Yii::$app->name ?> 2020</p>
                    </div>
                    <div class="col-md-6 col-sm-6">

                    </div>
                </div>
            </div>
        </footer>

        <!-- General JS Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <?php $this->endBody(); ?>

    </body>
</html>
<?php $this->endPage(); ?>

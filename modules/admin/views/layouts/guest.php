<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use app\assets\LoginAsset;
use app\widgets\Alert;
use app\widgets\Modals;

LoginAsset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
    <head>
        <?php include __DIR__.'/_header.php'; ?>
        <?php $this->head(); ?>
    </head>
    <body class="skin-reverse <?= Yii::$app->session->get('my_theme') ? 'skin-dark' : ''; ?> guest bg-primary">
        <?php $this->beginBody(); ?>
        <div class="header" style="background: transparent; border: none; margin: 10px 3px -10px 3px">
            <div class="">
                <div class="d-flex">
                    <div class="d-flex order-lg-2 ml-auto ">
                        <div style="margin-top: -2px;">
                            <?php // include __DIR__.'/_toggler.php'; ?>
                        </div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg" style="padding: 0.4rem 1rem;">
                                <i class="fas fa-globe-europe fa-2x"></i>
                                <span><?= strtoupper(Yii::$app->language); ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="<?= Url::to(['/auth/language']); ?>?lg=en" class="dropdown-item dropdown-item-unread">
                                    <?= Yii::$app->language == 'en' ? '<i class="m-nav__link-icon fas fa-check-circle"></i>' : '<i class="m-nav__link-icon fas fa-circle"></i>'; ?>
                                    <span class="m-nav__link-text"><?= Yii::t('app', 'Inglês'); ?></span>
                                </a>
                                <a href="<?= Url::to(['/auth/language']); ?>?lg=pt" class="dropdown-item dropdown-item-unread">
                                    <?= Yii::$app->language == 'pt' ? '<i class="m-nav__link-icon fas fa-check-circle"></i>' : '<i class="m-nav__link-icon fas fa-circle"></i>'; ?>
                                    <span class="m-nav__link-text"><?= Yii::t('app', 'Português'); ?></span>
                                </a>
                                <a href="<?= Url::to(['/auth/language']); ?>?lg=es" class="dropdown-item dropdown-item-unread">
                                    <?= Yii::$app->language == 'es' ? '<i class="m-nav__link-icon fas fa-check-circle"></i>' : '<i class="m-nav__link-icon fas fa-circle"></i>'; ?>
                                    <span class="m-nav__link-text"><?= Yii::t('app', 'Espanhol'); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="app">
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="login-brand">
                                <img  src="<?= Url::to('@web/images/logo/logo-v2-wy.svg', true) ?>" height="100" alt="<?= Yii::$app->name ?>" /> 
                            </div>
                            <?= Alert::widget(); ?>
                            <?= $content; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?=
        Modals::widget([
            'modals' => isset($this->params['modals']) ? $this->params['modals'] : [],
        ]);

        ?>

        <?php $this->endBody(); ?>



        <?php include __DIR__.'/_scripts.php'; ?>
        <!-- General JS Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    </body>
</html>
<?php $this->endPage(); ?>

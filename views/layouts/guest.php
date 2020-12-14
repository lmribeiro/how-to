<?php
/* @var $this View */
/* @var $content string */

use yii\helpers\Url;
use app\assets\LoginAsset;
use app\widgets\MyAlert;
use app\widgets\Modals;
use yii\web\View;

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

        <div id="app" style="margin-top: 5%;">
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="login-brand">
                                <h1 class="text-white">
                                    HOW-TO
                                </h1>
                            </div>
                            <?= MyAlert::widget(); ?>
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

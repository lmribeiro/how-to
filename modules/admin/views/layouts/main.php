<?php
/* @var $this View */
/* @var $content string */

use app\assets\AppAsset;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;
use app\widgets\Modals;

AppAsset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
    <head>
        <?php include __DIR__.'/_header.php'; ?>
        <?php $this->head(); ?>
    </head>
    <body class="skin-reverse <?= Yii::$app->session->get('theme') ? 'skin-dark' : ''; ?> <?= Yii::$app->session->get('min_sidebar') ? 'sidebar-mini' : ''; ?>">
        <?php $this->beginBody(); ?>

        <?= Alert::widget(); ?>

        <div id="app">
            <div class="main-wrapper main-wrapper-1">

                <?php include __DIR__.'/_navbar.php'; ?>
                <?php include __DIR__.'/_sidebar.php'; ?>

                <div class="main-content">
                    <div class="section">

                        <div class="section-header" >

                            <h1><?= $this->title; ?></h1>

                            <?=
                            Breadcrumbs::widget([
                                'options' => [
                                    'class' => 'section-header-breadcrumb',
                                ],
                                'encodeLabels' => false,
                                'homeLink' => [
                                    'label' => '<i class="fas fa-home"></i>',
                                    'url' => Yii::$app->homeUrl,
                                    'class' => 'breadcrumb-item',
                                ],
                                'itemTemplate' => '<div class="breadcrumb-item">{link}</div>',
                                'activeItemTemplate' => '<div class="breadcrumb-item active">{link}</div>',
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            ]);

                            ?>
                            <?= Yii::$app->params['subHeader'] ?>                           
                        </div>



                        <div class="section-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $content; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php include __DIR__.'/_scripts.php'; ?>
        <?=
        Modals::widget([
            'modals' => isset($this->params['modals']) ? $this->params['modals'] : [],
        ]);

        ?>

        <!-- General JS Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/pt.js"></script>
        <script>moment.locale('<?= Yii::$app->language ?>');</script>

        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>


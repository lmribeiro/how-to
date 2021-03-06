<?php
/* @var $this View */

/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Url;
use yii\web\View;

AppAsset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
<head>
    <?php include __DIR__ . '/_header.php'; ?>
    <?php $this->head(); ?>
</head>

<body class="base skin-reverse <?= Yii::$app->session->get('theme') ? 'skin-dark' : ''; ?>">
<?php $this->beginBody(); ?>
<?= Alert::widget(); ?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="left: 0">
    <div class="container">
        <a class="navbar-brand" href="<?= Yii::$app->controller->homeUrl ?>">
            <div class="base-brand">
                <svg xmlns="http://www.w3.org/2000/svg" width="75%" height="75%"
                     viewBox="5.550000190734863 -70.06999969482422 518.1500244140625 70.06999969482422">
                    <g class="logo-image">
                        <path d="M69.39 -70.07L69.39 -39.03L13.43 -39.03L13.43 -70.07L5.55 -70.07L5.55 0L13.43 0L13.43 -31.05L69.39 -31.05L69.39 0L77.37 0L77.37 -70.07Z M109.49 -70.07C106.25 -70.07 103.49 -68.94 101.22 -66.67C98.95 -64.4 97.81 -61.64 97.81 -58.39L97.81 -11.68C97.81 -8.43 98.95 -5.68 101.22 -3.41C103.49 -1.14 106.25 0 109.49 0L156.21 0C159.45 0 162.21 -1.14 164.48 -3.41C166.75 -5.68 167.88 -8.43 167.88 -11.68L167.88 -58.39C167.88 -61.64 166.75 -64.4 164.48 -66.67C162.21 -68.94 159.45 -70.07 156.21 -70.07ZM109.49 -7.88C108.45 -7.88 107.56 -8.26 106.81 -9C106.07 -9.75 105.69 -10.64 105.69 -11.68L105.69 -58.39C105.69 -59.43 106.07 -60.32 106.81 -61.07C107.56 -61.82 108.45 -62.19 109.49 -62.19L156.21 -62.19C157.24 -62.19 158.14 -61.82 158.88 -61.07C159.63 -60.33 160 -59.43 160 -58.39L160 -11.68C160 -10.64 159.63 -9.75 158.88 -9C158.14 -8.26 157.24 -7.88 156.21 -7.88Z M283.41 -70.07L263.07 -13.82L242.53 -70.07L232.99 -70.07L212.56 -13.82L192.02 -70.07L183.65 -70.07L209.15 0L215.96 0L237.76 -59.85L259.56 0L266.47 0L291.97 -70.07Z M348.42 -32.8L310.46 -32.8L310.46 -24.82L348.42 -24.82Z M366.72 -70.07L366.72 -62.19L397.86 -62.19L397.86 0L405.74 0L405.74 -62.19L436.79 -62.19L436.79 -70.07Z M465.31 -70.07C462.06 -70.07 459.3 -68.94 457.03 -66.67C454.76 -64.4 453.63 -61.64 453.63 -58.39L453.63 -11.68C453.63 -8.43 454.76 -5.68 457.03 -3.41C459.3 -1.14 462.06 0 465.31 0L512.02 0C515.27 0 518.02 -1.14 520.29 -3.41C522.57 -5.68 523.7 -8.43 523.7 -11.68L523.7 -58.39C523.7 -61.64 522.57 -64.4 520.29 -66.67C518.02 -68.94 515.27 -70.07 512.02 -70.07ZM465.31 -7.88C464.27 -7.88 463.38 -8.26 462.63 -9C461.88 -9.75 461.51 -10.64 461.51 -11.68L461.51 -58.39C461.51 -59.43 461.88 -60.32 462.63 -61.07C463.38 -61.82 464.27 -62.19 465.31 -62.19L512.02 -62.19C513.06 -62.19 513.95 -61.82 514.7 -61.07C515.44 -60.33 515.82 -59.43 515.82 -58.39L515.82 -11.68C515.82 -10.64 515.44 -9.75 514.7 -9C513.95 -8.26 513.06 -7.88 512.02 -7.88Z"></path>
                    </g>
                </svg>
            </div>
        </a>

        <div class="collapse navbar-collapse" id="">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto ml-lg-3 align-items-lg-center">
                    <li class="nav-item">
                        <a href="<?= Url::to(['/']) ?>" class="nav-link">
                            <?= Yii::t('app', 'Knowledge Base'); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= Url::to(['/faqs']) ?>" class="nav-link">
                            <?= Yii::t('app', 'FAQs'); ?>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="d-flex ml-auto">

                <?php if (Yii::$app->user->isGuest) { ?>
                    <ul class="navbar-nav ml-auto d-none d-lg-block">
                        <li class="nav-item">
                            <a href="<?= Url::to(['/auth/login']) ?>" class="btn btn-outline-white">
                                Login
                            </a>
                            &nbsp;
                            <a href="<?= Url::to(['/auth/signup']) ?>" class="btn btn-white">
                                Registar
                            </a>
                        </li>
                    </ul>
                <?php } else { ?>
                    <ul class="navbar-nav navbar-right text-white">

                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown"
                               class="nav-link dropdown-toggle menu-toggle nav-link-lg nav-link-user text-white">
                                <img alt="image"
                                     src="<?= Yii::$app->user->identity->getThumb('avatar', 'thumb', true); ?>"
                                     class="rounded-circle mr-1">
                                <div class="d-sm-none d-lg-inline-block"><?= Yii::t('app', 'Olá'); ?> <?= Yii::$app->user->identity->name; ?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-title"><?= Yii::t('app', 'Tema'); ?></div>
                                <?php if (Yii::$app->session->get('theme')) { ?>
                                    <a class="dropdown-item"
                                       href="<?= Url::to(['site/theme', 'id' => false]); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-top: -4px;" width="16"
                                             height="16" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-sun">
                                            <circle cx="12" cy="12" r="5"></circle>
                                            <line x1="12" y1="1" x2="12" y2="3"></line>
                                            <line x1="12" y1="21" x2="12" y2="23"></line>
                                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                            <line x1="1" y1="12" x2="3" y2="12"></line>
                                            <line x1="21" y1="12" x2="23" y2="12"></line>
                                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                        </svg>
                                        <?= Yii::t('app', 'Claro'); ?>
                                    </a>
                                <?php } else { ?>
                                    <a class="dropdown-item"
                                       href="<?= Url::to(['site/theme', 'id' => true]); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-top: -4px;" width="16"
                                             height="16" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-moon">
                                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                        </svg>
                                        <?= Yii::t('app', 'Escuro'); ?>
                                    </a>
                                <?php } ?>
                                <?php foreach (Yii::$app->controller->topNav as $n) { ?>
                                    <div class="dropdown-title"><?= $n['name']; ?></div>
                                    <?php foreach ($n['items'] as $item) { ?>
                                        <a class="dropdown-item has-icon <?= $item['class']; ?>"
                                           href="<?= Url::to([$item['action']]); ?>">
                                            <i class="<?= $item['icon']; ?>"></i>
                                            <?= $item['name']; ?>
                                        </a>
                                    <?php } ?>
                                <?php } ?>

                            </div>
                        </li>
                    </ul>
                <?php } ?>
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
            <svg style='height: 33px' focusable="false" data-prefix="fas" data-icon="angle-up"
                 class="svg-inline--fa fa-angle-up fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 320 512">
                <path fill="currentColor"
                      d="M177 159.7l136 136c9.4 9.4 9.4 24.6 0 33.9l-22.6 22.6c-9.4 9.4-24.6 9.4-33.9 0L160 255.9l-96.4 96.4c-9.4 9.4-24.6 9.4-33.9 0L7 329.7c-9.4-9.4-9.4-24.6 0-33.9l136-136c9.4-9.5 24.6-9.5 34-.1z"></path>
            </svg>
        </a>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <?php if (Yii::$app->controller->id == 'faqs') { ?>
                    <a href="<?= Url::to(['/']) ?>">
                        <i class="fas fa-graduation-cap"></i>
                        <?= Yii::t('app', 'Knowledge Base'); ?>
                    </a>
                <?php } else { ?>
                    <a href="<?= Url::to(['/faqs/index']) ?>">
                        <i class="fas fa-question-circle"></i>
                        <?= Yii::t('app', 'FAQs'); ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <p>© 2020 <?= Yii::$app->name ?> | <?= Yii::t('app', 'Knowledge Base'); ?></p>
            </div>
        </div>
    </div>
</footer>

<!-- General JS Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<?php $this->endBody(); ?>

</body>
</html>
<?php $this->endPage(); ?>

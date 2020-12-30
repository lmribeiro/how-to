<?php

use yii\helpers\Url;

$this->title = Yii::$app->name;

?>
<style>

</style>
<div class="hero-wrapper" id="top">
    <div class="hero">
        <div class="container">
            <div class="text text-center text-lg-left">
                <a href="https://github.com/lmribeiro/how-to" class="headline" target="new">
                    <div class="badge badge-info">
                        <i class="fa fa-code-branch"></i>
                    </div>
                    <?= Yii::t('app', 'HOW-TO é 100% open source') ?> &nbsp; <i class="fas fa-chevron-right"></i>
                </a>
                <h1><?= Yii::t('app', 'Knowledge Base simples e gratuita') ?></h1>
                <p class="lead text-justify">
                    <?= Yii::t('app', 'How-to irá ajudár-te a acelerar o teu projeto para criar uma Knowledge Base simples bonita e moderna.') ?>
                </p>
                <div class="cta">
                    <a class="btn btn-lg btn-warning btn-icon icon-right" href="https://getstisla.com/getting-started">Get
                        Started <i class="fas fa-chevron-right"></i></a> &nbsp;
                    <div class="mt-3 text-job">
                        MIT License &nbsp;&nbsp;•&nbsp;&nbsp; Version: 1.0.0
                    </div>
                </div>
            </div>
            <div class="image d-none d-lg-block">
                <img src="<?= Url::to('@web/images/knowledge.svg', true) ?>" alt="img">
            </div>
        </div>
    </div>
</div>

<div class="callout container">
    <div class="row">
        <div class="col-md-6 col-12 mb-4 mb-lg-0">
            <div class="text-job text-muted text-14">not a reason to use Stisla</div>
            <div class="h1 mb-0 font-weight-bold"><span class="font-weight-500">just a </span>statistic</div>
        </div>
        <div class="col-4 col-md-2 text-center">
            <div class="h2 font-weight-bold">7000+</div>
            <div class="text-uppercase font-weight-bold ls-2 text-primary">Downloads</div>
        </div>
        <div class="col-4 col-md-2 text-center">
            <div class="h2 font-weight-bold">125+</div>
            <div class="text-uppercase font-weight-bold ls-2 text-primary">Countries</div>
        </div>
        <div class="col-4 col-md-2 text-center">
            <div class="h2 font-weight-bold">6500+</div>
            <div class="text-uppercase font-weight-bold ls-2 text-primary">Sessions</div>
        </div>
    </div>
</div>

<section id="design" class="section-design">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block">
                <img src="<?= Url::to('@web/images/typewriter.svg', true) ?>" alt="img" class="img-fluid">
            </div>
            <div class="col-lg-7 pl-lg-5 col-md-12 text-justify">
                <div class="badge badge-primary mb-3 text-uppercase"><?= Yii::t('app', 'Dá atenção ao que  importa') ?></div>
                <h2><?= Yii::t('app', 'Usa o teu tempo para') ?>
                    <span class="text-primary"><?= Yii::t('app', 'escrever artigos') ?></span>,
                    <?= Yii::t('app', 'não para desenvolver o') ?> <span
                            class="text-primary"><?= Yii::t('app', 'sistema') ?></span>.</h2>
                <p class="lead">
                    <?= Yii::t('app', 'A tua prioridade deve ser escrever artigos para a Knowledge Base, não perder tempo a pensar em como os disponibilizar aos utilizadores. How-to trata disso por ti.') ?>
                </p>
                <div class="mt-4">
                    <a href="" class="link-icon">
                        Getting Started with Stisla <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="components" class="section-design section-skew bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 pr-lg-5 pr-0">
                <div class="badge badge-primary mb-3">Clean Components</div>
                <h2>Focus on your <span class="text-primary">goal</span>, let <span class="text-primary">Stisla</span>
                    help you to <span class="text-primary">design</span> the dashboard</h2>
                <p class="lead">Designing a dashboard can be a nightmare if it's not based on a concept, your time will
                    run out just to think about what components will be created. Stisla has many components, so you just
                    need to adjust it. Save your time, go to bed early.</p>
                <div class="mt-4">
                    <a href="" class="link-icon">
                        Explore Components <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <img src="<?= Url::to('@web/images/safe.svg', true) ?>" alt="img" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section id="features">
    <div class="container">
        <div class="row mb-5 text-center">
            <div class="col-lg-10 offset-lg-1">
                <h2>Stisla is <span class="text-primary">designed for you</span> and your clients</h2>
                <p class="lead">Integrated with 30+ third-party libraries and has many components, you will easily to
                    create a dashboard layout.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="features">
                    <div class="feature">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h5>Responsive Design</h5>
                        <p>Don't worry about the gadget you have. Stisla is very suitable for every platform.</p>
                    </div>
                    <div class="feature">
                        <div class="feature-icon">
                            <i class="fab fa-html5"></i>
                        </div>
                        <h5>HTML5 &amp; CSS3</h5>
                        <p>Written with HTML5 and CSS3 and supported by most modern browsers.</p>
                    </div>
                    <div class="feature">
                        <div class="feature-icon">
                            <i class="fas fa-fire"></i>
                        </div>
                        <h5>JavaScript APIs</h5>
                        <p>We provide some javascript APIs to interact with some components more easily.</p>
                    </div>
                    <div class="feature">
                        <div class="feature-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <h5>Verified By W3C?</h5>
                        <p>All HTML pages are free of errors, because they have been verified by W3C.</p>
                    </div>
                    <div class="feature">
                        <div class="feature-icon">
                            <i class="fas fa-columns"></i>
                        </div>
                        <h5>Bootstrap 4</h5>
                        <p>Based on Bootstrap 4, one of the popular flexbox frameworks.</p>
                    </div>
                    <div class="feature">
                        <div class="feature-icon">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <h5>And Others</h5>
                        <p>We don't want to talk much about this template, try it yourself and don't say anything.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="dashboard" class="section-skew">
    <div class="container">
        <div class="row mb-5 text-center">
            <div class="col-lg-10 offset-lg-1">
                <h2>JavaScript <span class="text-primary">APIs</span></h2>
                <p class="lead">Some components have JavaScript APIs to interact with. The example below is to create a
                    Bootstrap Modal quickly without HTML Markup.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselIndicators" data-slide-to="1" class=""></li>
                        <li data-target="#carouselIndicators" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?= Url::to('@web/images/safe.svg', true) ?>"
                                 alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?= Url::to('@web/images/safe.svg', true) ?>"
                                 alt="Second slide">
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?= Url::to('@web/images/safe.svg', true) ?>"
                                 alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-12 col-lg-8 offset-lg-2 text-center">
                <p><span class="text-success font-weight-bold">Good news</span>. Besides Bootstrap Modal, we have other
                    interfaces to interact with components, such as Card, Chat Box, and so on.</p>
            </div>
        </div>
    </div>
</section>

<section class="download-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7">
                <h2><?= Yii::t('app', 'Começe agora a sua Knowledge Base') ?></h2>
                <p class="lead">Start your amazing project with Stisla, don't start designing from scratch.</p>
            </div>
            <div class="col-md-5 text-right">
                <a href="https://github.com/lmribeiro/how-to/archive/master.zip" class="btn btn-primary btn-lg">Download
                    How-to</a>
            </div>
        </div>
    </div>
</section>

<section class="before-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card long-shadow">
                    <div class="card-body d-flex p-45">
                        <div class="card-icon bg-primary text-white">
                            <i class="far fa-file"></i>
                        </div>
                        <div>
                            <h5>Explore The Docs</h5>
                            <p class="lh-sm">Find out how to use Stisla, find out how to make Cards, Navbar, Tables,
                                Maps and so on. Find out everything in the documentation.</p>
                            <div class="mt-4 text-right">
                                <a href="https://getstisla.com/docs" class="link-icon">
                                    <?= Yii::t('app', 'Documentação') ?>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card long-shadow">
                    <div class="card-body p-45 d-flex">
                        <div class="card-icon bg-primary text-white">
                            <i class="far fa-life-ring"></i>
                        </div>
                        <div>
                            <h5><?= Yii::t('app', 'Suporte') ?></h5>
                            <p class="lh-sm">
                                <?= Yii::t('app', 'Precisas de ajuda com How-to ou encontras-te algum bug? Abre um issue no GitHub. Seremos tão rápidos quanto possivel.') ?>
                            </p>
                            <div class="mt-4 text-right">
                                <a href="https://github.com/lmribeiro/how-to/issues" class="link-icon">
                                    <?= Yii::t('app', 'Suporte') ?>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <svg xmlns="http://www.w3.org/2000/svg" width="15%" height="15%"
                     viewBox="5.550000190734863 -70.06999969482422 518.1500244140625 70.06999969482422">
                    <g fill="#fff">
                        <path d="M69.39 -70.07L69.39 -39.03L13.43 -39.03L13.43 -70.07L5.55 -70.07L5.55 0L13.43 0L13.43 -31.05L69.39 -31.05L69.39 0L77.37 0L77.37 -70.07Z M109.49 -70.07C106.25 -70.07 103.49 -68.94 101.22 -66.67C98.95 -64.4 97.81 -61.64 97.81 -58.39L97.81 -11.68C97.81 -8.43 98.95 -5.68 101.22 -3.41C103.49 -1.14 106.25 0 109.49 0L156.21 0C159.45 0 162.21 -1.14 164.48 -3.41C166.75 -5.68 167.88 -8.43 167.88 -11.68L167.88 -58.39C167.88 -61.64 166.75 -64.4 164.48 -66.67C162.21 -68.94 159.45 -70.07 156.21 -70.07ZM109.49 -7.88C108.45 -7.88 107.56 -8.26 106.81 -9C106.07 -9.75 105.69 -10.64 105.69 -11.68L105.69 -58.39C105.69 -59.43 106.07 -60.32 106.81 -61.07C107.56 -61.82 108.45 -62.19 109.49 -62.19L156.21 -62.19C157.24 -62.19 158.14 -61.82 158.88 -61.07C159.63 -60.33 160 -59.43 160 -58.39L160 -11.68C160 -10.64 159.63 -9.75 158.88 -9C158.14 -8.26 157.24 -7.88 156.21 -7.88Z M283.41 -70.07L263.07 -13.82L242.53 -70.07L232.99 -70.07L212.56 -13.82L192.02 -70.07L183.65 -70.07L209.15 0L215.96 0L237.76 -59.85L259.56 0L266.47 0L291.97 -70.07Z M348.42 -32.8L310.46 -32.8L310.46 -24.82L348.42 -24.82Z M366.72 -70.07L366.72 -62.19L397.86 -62.19L397.86 0L405.74 0L405.74 -62.19L436.79 -62.19L436.79 -70.07Z M465.31 -70.07C462.06 -70.07 459.3 -68.94 457.03 -66.67C454.76 -64.4 453.63 -61.64 453.63 -58.39L453.63 -11.68C453.63 -8.43 454.76 -5.68 457.03 -3.41C459.3 -1.14 462.06 0 465.31 0L512.02 0C515.27 0 518.02 -1.14 520.29 -3.41C522.57 -5.68 523.7 -8.43 523.7 -11.68L523.7 -58.39C523.7 -61.64 522.57 -64.4 520.29 -66.67C518.02 -68.94 515.27 -70.07 512.02 -70.07ZM465.31 -7.88C464.27 -7.88 463.38 -8.26 462.63 -9C461.88 -9.75 461.51 -10.64 461.51 -11.68L461.51 -58.39C461.51 -59.43 461.88 -60.32 462.63 -61.07C463.38 -61.82 464.27 -62.19 465.31 -62.19L512.02 -62.19C513.06 -62.19 513.95 -61.82 514.7 -61.07C515.44 -60.33 515.82 -59.43 515.82 -58.39L515.82 -11.68C515.82 -10.64 515.44 -9.75 514.7 -9C513.95 -8.26 513.06 -7.88 512.02 -7.88Z"></path>
                    </g>
                </svg>
                <div class="pr-lg-5">
                    <p>How-to was created by <a href="https://twitter.com/_l_ribeiro">Luis Ribeiro</a> to
                        help you create a greate Knowledge Base faste. How-to is free and open source.</p>
                    <p>© How-to. With <i class="fas fa-heart text-danger"></i> from Portugal</p>
                    <div class="mt-4 social-links">
                        <a href="https://github.com/lmribeiro"><i class="fab fa-github"></i></a>
                        <a href="https://twitter.com/_l_ribeiro"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

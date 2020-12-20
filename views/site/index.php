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
                        MIT License &nbsp;&nbsp;•&nbsp;&nbsp; Version: 2.2.0
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
                <div class="abs-images">
                    <img src="https://getstisla.com/landing/components/countries.png" alt="user flow"
                         class="img-fluid rounded dark-shadow">
                    <img src="https://getstisla.com/landing/components/ticket.png" alt="user flow"
                         class="img-fluid rounded dark-shadow">
                    <img src="https://getstisla.com/landing/components/user.png" alt="user flow"
                         class="img-fluid rounded dark-shadow">
                </div>
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
            <div class="col-md-6">
                <div class="pre-block">
                        <pre class="language-js code-toolbar" data-name="modal.js">
                            <code class=" language-js">
                                <span class="token function">$</span>
                                <span class="token punctuation">(</span>
                                <span class="token string">"#my-button"</span>
                                <span class="token punctuation">)</span><span
                                        class="token punctuation">.</span><span
                                        class="token function">fireModal</span><span
                                        class="token punctuation">(</span><span class="token punctuation">{</span>
  body<span class="token punctuation">:</span> <span
                                        class="token string">'&lt;p&gt;Your content goes here.&lt;/p&gt;'</span><span
                                        class="token punctuation">,</span>
  created<span class="token punctuation">:</span> <span class="token keyword">function</span><span
                                        class="token punctuation">(</span>modal<span class="token punctuation">)</span> <span
                                        class="token punctuation">{</span>
      console<span class="token punctuation">.</span><span class="token function">log</span><span
                                        class="token punctuation">(</span><span class="token string">'Modal has been created'</span><span
                                        class="token punctuation">)</span><span class="token punctuation">;</span>
  <span class="token punctuation">}</span><span class="token punctuation">,</span>
  buttons<span class="token punctuation">:</span> <span class="token punctuation">[</span>
    <span class="token punctuation">{</span>
      text<span class="token punctuation">:</span> <span class="token string">'Action'</span><span
                                        class="token punctuation">,</span>
      <span class="token keyword">class</span><span class="token punctuation">:</span> <span class="token string">'btn btn-primary btn-shadow'</span><span
                                        class="token punctuation">,</span>
      handler<span class="token punctuation">:</span> <span class="token keyword">function</span><span
                                        class="token punctuation">(</span>modal<span class="token punctuation">)</span> <span
                                        class="token punctuation">{</span>
        <span class="token comment">// do something</span>
        <span class="token function">alert</span><span class="token punctuation">(</span><span class="token string">'Clicked'</span><span
                                        class="token punctuation">)</span><span class="token punctuation">;</span>
      <span class="token punctuation">}</span>
    <span class="token punctuation">}</span>
  <span class="token punctuation">]</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code><div
                                    class="toolbar"><div class="toolbar-item"><span>Js</span></div><div
                                        class="toolbar-item"><a>Copy</a></div></div></pre>
                </div>
            </div>
            <div class="col-md-6">
                <div class="browser-container">
                    <div class="browser-row">
                        <div class="browser-column browser-left">
                            <span class="browser-dot" style="background:#fc544b;"></span>
                            <span class="browser-dot" style="background:#ffa426;"></span>
                            <span class="browser-dot" style="background:#63ed7a;"></span>
                        </div>
                        <div class="browser-column browser-middle">
                            <input type="text" readonly="" value="about:blank">
                        </div>
                        <div class="browser-column browser-right">
                            <div class="float-right">
                                <span class="browser-bar"></span>
                                <span class="browser-bar"></span>
                                <span class="browser-bar"></span>
                            </div>
                        </div>
                    </div>

                    <div class="browser-content d-flex align-items-center justify-content-center flex-column">
                        <p class="mb-2">Click the button below to run the JavaScript code on the left side.</p>
                        <a href="#" class="btn btn-primary trigger--fire-modal-1" id="my-button">Click Me</a>
                    </div>
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
                <a href="https://github.com/lmribeiro/how-to/archive/master.zip" class="btn btn-primary btn-lg">Download How-to</a>
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
                                <a href="https://getstisla.com/docs" class="link-icon">Documentation <i
                                            class="fas fa-chevron-right"></i></a>
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
                                <?= Yii::t('app', 'Precisas de ajuda com How-to ou encontras-te algum bug? Abre um issue no GitHub. Seremos tão rápidpos quanto possivel.') ?>
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
                <h3 class="text-capitalize">HOW-TO</h3>
                <div class="pr-lg-5">
                    <p>Stisla was created by <a href="https://twitter.com/mhdnauvalazhar">Muhamad Nauval Azhar</a> to
                        help developers create their own UI designs for the dashboard. Stisla is free for anyone,
                        support us by becoming a sponsor and keeping this project alive.</p>
                    <p>© Stisla. With <i class="fas fa-heart text-danger"></i> from Indonesia</p>
                    <div class="mt-4 social-links">
                        <a href="https://github.com/stisla"><i class="fab fa-github"></i></a>
                        <a href="https://twitter.com/getstisla"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

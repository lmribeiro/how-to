<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = Yii::t('app', 'Completar Dados');

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">

<head>
    <?php include __DIR__ . '/_header.php'; ?>
    <?php $this->head(); ?>
</head>

<body class="wizard skin-reverse <?= Yii::$app->session->get('my_theme') ? 'skin-dark' : ''; ?> <?= Yii::$app->controller->side_nav->sidebar; ?>">

    <?php $this->beginBody(); ?>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <section class="section mt-4">
                <div class="container">

                    <div class="header" style="background: transparent; border: none; margin: 0;">
                        <div class="">
                            <div class="d-flex">
                                <?php if (Yii::$app->user->identity->merchant_view) { ?>
                                    &nbsp;&nbsp;&nbsp;
                                    <li style="list-style: none;  margin-top: 4px;">
                                        <span class="badge badge-primary" style="padding: 8px 12px;">
                                            <?= Yii::t('app', 'A ver como') ?>: <strong><?= Yii::$app->user->identity->merchant->name ?></strong>
                                            <a href="<?= Url::to(['dashboard/leave-merchant-view']) ?>" title="<?= Yii::t('app', 'Sair'); ?>" class="close tooltip-data float-right" style="margin: -10px -1px -2px 8px;">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </span>
                                    </li>
                                <?php } ?>
                                <div class="d-flex order-lg-3 ml-auto ">
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
                                            <i class="fas fa-globe-europe fa-2x" style="margin-top: 7px;"></i>
                                            <?= strtoupper(Yii::$app->language) ?>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="<?= Url::to(['/auth/language']); ?>?lg=en" class="dropdown-item dropdown-item-unread">
                                                <?= Yii::$app->language == 'en' ? '<i class="m-nav__link-icon fas fa-check-circle"></i>' : '<i class="m-nav__link-icon fas fa-circle"></i>' ?>
                                                <span class="m-nav__link-text"><?= Yii::t('app', 'Inglês') ?></span>
                                            </a>
                                            <a href="<?= Url::to(['/auth/language']); ?>?lg=pt" class="dropdown-item dropdown-item-unread">
                                                <?= Yii::$app->language == 'pt' ? '<i class="m-nav__link-icon fas fa-check-circle"></i>' : '<i class="m-nav__link-icon fas fa-circle"></i>' ?>
                                                <span class="m-nav__link-text"><?= Yii::t('app', 'Português') ?></span>
                                            </a>
                                            <a href="<?= Url::to(['/auth/language']); ?>?lg=es" class="dropdown-item dropdown-item-unread">
                                                <?= Yii::$app->language == 'es' ? '<i class="m-nav__link-icon fas fa-check-circle"></i>' : '<i class="m-nav__link-icon fas fa-circle"></i>' ?>
                                                <span class="m-nav__link-text"><?= Yii::t('app', 'Espanhol') ?></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="<?= Url::to(['/auth/logout']); ?>" class="btn btn-primary">
                                            SAIR <i class="fas fa-sign-out-alt"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="login-brand">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 348.6 92.6" style="enable-background:new 0 0 348.6 92.6;height: 50px;" xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #DF0024;
                                        }

                                        .st1 {
                                            fill: #1F2023;
                                        }
                                    </style>
                                    <g>
                                        <path class="st0" d="M58.5,85.1c-5.6,1.7-11.9,2.9-18,2.9c-20.3,0-31-12.6-31-31.6c0-18.9,10.7-31.6,31-31.6c6.1,0,12.4,1.2,18,2.9
                              L56,40.3c-5.5-1.7-9.1-2.4-13.5-2.4c-10.5,0-14.8,7.8-14.8,18.5c0,10.7,4.4,18.5,14.8,18.5c4.4,0,8-0.7,13.5-2.4L58.5,85.1z" />
                                        <path class="st0" d="M84.8,39.1v30.8c0,4.1,2.8,5.4,5.5,5.4c1.2,0,3.8-0.1,5.2-0.5V87c-3.5,0.6-9.6,1-12.5,1
                              c-12.6,0-15.6-6.8-15.6-16.4V39.1V26V18l17.4-9.1v17h10.7v13.1H84.8z" />
                                        <path class="st0" d="M121.3,39.1v30.8c0,4.1,2.8,5.4,5.5,5.4c1.2,0,3.8-0.1,5.2-0.5V87c-3.5,0.6-9.6,1-12.5,1
                              c-12.6,0-15.6-6.8-15.6-16.4V18l17.4-9.1v17H132v13.1H121.3z" />
                                        <g>
                                            <path class="st1" d="M171.6,42.9c1,0,1.9-0.2,2.6-0.6c0.7-0.4,1.2-0.8,1.7-1.2c0.5-0.5,0.9-1.1,1.2-1.8l8.1,0.7
                              c-0.3,1.3-0.8,2.6-1.6,3.8c-0.8,1.3-1.8,2.4-3,3.4c-1.2,1-2.5,1.8-4,2.4c-1.5,0.6-3.1,0.9-4.9,0.9c-2,0-3.9-0.4-5.7-1.1
                              c-1.7-0.7-3.3-1.8-4.6-3.1c-1.3-1.3-2.3-2.8-3.1-4.6c-0.7-1.8-1.1-3.7-1.1-5.8s0.4-4,1.1-5.8c0.7-1.8,1.8-3.3,3.1-4.6
                              c1.3-1.3,2.8-2.3,4.6-3.1c1.7-0.7,3.6-1.1,5.7-1.1c1.7,0,3.4,0.3,4.9,0.9c1.5,0.6,2.9,1.4,4,2.4c1.2,1,2.2,2.1,3,3.4
                              c0.8,1.3,1.3,2.5,1.6,3.8l-8.1,0.7c-0.3-0.7-0.7-1.3-1.2-1.8c-0.4-0.4-1-0.9-1.7-1.2c-0.7-0.4-1.5-0.6-2.6-0.6
                              c-0.9,0-1.7,0.2-2.5,0.5c-0.8,0.3-1.5,0.8-2.1,1.4c-0.6,0.6-1,1.3-1.4,2.2c-0.3,0.9-0.5,1.8-0.5,2.8c0,1,0.2,2,0.5,2.8
                              c0.3,0.9,0.8,1.6,1.4,2.2c0.6,0.6,1.3,1.1,2.1,1.4C169.8,42.7,170.7,42.9,171.6,42.9z" />
                                            <path class="st1" d="M208.6,39.8c0,1.5-0.3,2.9-0.8,4.2c-0.6,1.3-1.3,2.4-2.3,3.4c-1,1-2.2,1.7-3.5,2.3c-1.3,0.6-2.8,0.8-4.4,0.8
                              c-1.6,0-3-0.3-4.4-0.8c-1.3-0.6-2.5-1.3-3.5-2.3c-1-1-1.8-2.1-2.3-3.4c-0.6-1.3-0.8-2.7-0.8-4.2c0-1.5,0.3-2.9,0.8-4.2
                              c0.6-1.3,1.3-2.4,2.3-3.4c1-1,2.1-1.7,3.5-2.3c1.3-0.6,2.8-0.8,4.4-0.8c1.6,0,3,0.3,4.4,0.8c1.3,0.6,2.5,1.3,3.5,2.3
                              c1,1,1.8,2.1,2.3,3.4C208.4,36.8,208.6,38.2,208.6,39.8z M193.8,39.8c0,1.1,0.4,2.1,1.1,2.9c0.8,0.8,1.7,1.2,2.7,1.2
                              c1,0,1.9-0.4,2.7-1.2c0.8-0.8,1.1-1.7,1.1-2.9c0-1.1-0.4-2.1-1.1-2.9c-0.8-0.8-1.7-1.2-2.7-1.2c-1,0-1.9,0.4-2.7,1.2
                              C194.2,37.7,193.8,38.6,193.8,39.8z" />
                                            <path class="st1" d="M235.1,29c2.2,0,3.9,0.7,5.2,2.2c1.3,1.4,2,3.6,2,6.4v12.6h-7.2V38.9c0-1.1-0.2-1.9-0.6-2.4
                              c-0.4-0.5-1-0.7-1.6-0.7c-0.7,0-1.2,0.2-1.6,0.7c-0.4,0.5-0.6,1.3-0.6,2.4v11.2h-7.2V38.9c0-1.1-0.2-1.9-0.6-2.4
                              c-0.4-0.5-1-0.7-1.6-0.7c-0.7,0-1.2,0.2-1.6,0.7c-0.4,0.5-0.6,1.3-0.6,2.4v11.2h-7.2V29.4h5.2l1.1,2c0.5-0.4,1-0.9,1.5-1.2
                              c0.5-0.3,1-0.6,1.7-0.9c0.7-0.3,1.4-0.4,2.2-0.4c1,0,1.9,0.1,2.6,0.4c0.7,0.3,1.3,0.6,1.7,0.9c0.5,0.4,1,0.8,1.3,1.3
                              c0.5-0.5,1-1,1.7-1.3c0.5-0.3,1.2-0.6,1.9-0.9C233.4,29.1,234.2,29,235.1,29z" />
                                            <path class="st1" d="M266.1,43.8c-0.3,0.8-0.7,1.7-1.2,2.5c-0.5,0.8-1.2,1.5-2,2.2c-0.8,0.6-1.8,1.1-2.9,1.5
                              c-1.1,0.4-2.4,0.6-3.8,0.6c-1.6,0-3-0.3-4.4-0.8s-2.5-1.3-3.5-2.3c-1-1-1.8-2.1-2.3-3.4c-0.6-1.3-0.8-2.7-0.8-4.2
                              c0-1.5,0.3-2.9,0.8-4.2c0.6-1.3,1.3-2.4,2.3-3.4c1-1,2.1-1.7,3.5-2.3c1.3-0.6,2.8-0.8,4.4-0.8c1.5,0,2.8,0.3,4.1,0.8
                              c1.3,0.5,2.4,1.3,3.3,2.2c1,0.9,1.7,2.1,2.3,3.3c0.6,1.3,0.8,2.7,0.8,4.2c0,0.3,0,0.6,0,0.8c0,0.3-0.1,0.5-0.1,0.7
                              c0,0.2-0.1,0.5-0.1,0.7h-13.7c0.1,0.5,0.4,1,0.7,1.3c0.2,0.3,0.6,0.6,1,0.9c0.4,0.3,1,0.4,1.7,0.4c0.5,0,0.9-0.1,1.3-0.2
                              c0.3-0.1,0.6-0.3,0.8-0.5c0.2-0.2,0.4-0.4,0.6-0.7L266.1,43.8z M256.2,34.8c-0.9,0-1.7,0.3-2.3,0.9c-0.6,0.6-1,1.3-1.1,2h6.7
                              c-0.1-0.8-0.5-1.5-1.1-2C257.9,35.1,257.1,34.8,256.2,34.8z M256,20.7h7.4l-4.5,6.3h-5.8L256,20.7z" />
                                            <path class="st1" d="M280.9,29c0.3,0,0.6,0,0.9,0.1c0.3,0,0.5,0.1,0.7,0.2c0.2,0.1,0.4,0.2,0.6,0.2v7.4c-0.2-0.1-0.4-0.1-0.7-0.2
                              c-0.2-0.1-0.5-0.1-0.8-0.2c-0.3,0-0.6-0.1-0.9-0.1c-1,0-1.9,0.4-2.6,1.1c-0.7,0.7-1,1.7-1,3v9.7h-7.2V29.4h5.2l1.1,2
                              c0.4-0.4,0.8-0.9,1.3-1.2c0.4-0.3,0.9-0.6,1.5-0.9C279.5,29.1,280.2,29,280.9,29z" />
                                            <path class="st1" d="M296,29c1.1,0,2.1,0.1,3,0.4c0.9,0.2,1.7,0.6,2.4,0.9c0.7,0.4,1.3,0.8,1.8,1.3c0.5,0.5,1,1,1.3,1.5
                              c0.8,1.2,1.4,2.6,1.8,4.1l-7,0.7c-0.2-0.4-0.4-0.8-0.8-1.1c-0.3-0.3-0.6-0.5-1.1-0.8c-0.4-0.2-1-0.4-1.5-0.4c-1,0-1.9,0.4-2.7,1.2
                              c-0.8,0.8-1.1,1.7-1.1,2.9c0,1.1,0.4,2.1,1.1,2.9c0.8,0.8,1.7,1.2,2.7,1.2c0.6,0,1.1-0.1,1.5-0.3c0.4-0.2,0.8-0.5,1.1-0.8
                              c0.3-0.3,0.6-0.7,0.8-1.1l7,0.7c-0.4,1.6-1,3-1.8,4.2c-0.4,0.5-0.8,1-1.3,1.5c-0.5,0.5-1.1,0.9-1.8,1.3c-0.7,0.4-1.5,0.7-2.4,0.9
                              c-0.9,0.2-1.9,0.4-3,0.4c-1.6,0-3-0.3-4.4-0.8c-1.3-0.6-2.5-1.3-3.5-2.3c-1-1-1.8-2.1-2.3-3.4c-0.6-1.3-0.8-2.7-0.8-4.2
                              c0-1.5,0.3-2.9,0.8-4.2c0.6-1.3,1.3-2.4,2.3-3.4c1-1,2.1-1.7,3.5-2.3C292.9,29.3,294.4,29,296,29z" />
                                            <path class="st1" d="M309,23.8c0-1,0.4-1.9,1.1-2.6c0.7-0.7,1.6-1,2.8-1c1.1,0,2.1,0.3,2.8,1c0.7,0.7,1.1,1.5,1.1,2.6
                              c0,1-0.4,1.9-1.1,2.6c-0.7,0.7-1.6,1-2.8,1c-1.1,0-2.1-0.3-2.8-1C309.3,25.7,309,24.8,309,23.8z M309.2,29.4h7.2v20.7h-7.2V29.4z" />
                                            <path class="st1" d="M341.5,39.8c0,1.5-0.3,2.9-0.8,4.2c-0.6,1.3-1.3,2.4-2.3,3.4c-1,1-2.2,1.7-3.5,2.3c-1.3,0.6-2.8,0.8-4.4,0.8
                              c-1.6,0-3-0.3-4.4-0.8c-1.3-0.6-2.5-1.3-3.5-2.3c-1-1-1.8-2.1-2.3-3.4c-0.6-1.3-0.8-2.7-0.8-4.2c0-1.5,0.3-2.9,0.8-4.2
                              c0.6-1.3,1.3-2.4,2.3-3.4c1-1,2.1-1.7,3.5-2.3c1.3-0.6,2.8-0.8,4.4-0.8c1.6,0,3,0.3,4.4,0.8c1.3,0.6,2.5,1.3,3.5,2.3
                              c1,1,1.8,2.1,2.3,3.4C341.3,36.8,341.5,38.2,341.5,39.8z M326.7,39.8c0,1.1,0.4,2.1,1.1,2.9c0.8,0.8,1.7,1.2,2.7,1.2
                              c1,0,1.9-0.4,2.7-1.2c0.8-0.8,1.1-1.7,1.1-2.9c0-1.1-0.4-2.1-1.1-2.9c-0.8-0.8-1.7-1.2-2.7-1.2c-1,0-1.9,0.4-2.7,1.2
                              C327.1,37.7,326.7,38.6,326.7,39.8z" />
                                            <path class="st1" d="M158.3,59.8h7.9v20.7h12.3v7.6h-20.2V59.8z" />
                                            <path class="st1" d="M201.7,77.8c0,1.5-0.3,2.9-0.8,4.2c-0.6,1.3-1.3,2.4-2.3,3.4c-1,1-2.2,1.7-3.5,2.3c-1.3,0.6-2.8,0.8-4.4,0.8
                              c-1.6,0-3-0.3-4.4-0.8c-1.3-0.6-2.5-1.3-3.5-2.3c-1-1-1.8-2.1-2.3-3.4c-0.6-1.3-0.8-2.7-0.8-4.2c0-1.5,0.3-2.9,0.8-4.2
                              c0.6-1.3,1.3-2.4,2.3-3.4c1-1,2.1-1.7,3.5-2.3c1.3-0.6,2.8-0.8,4.4-0.8c1.6,0,3,0.3,4.4,0.8c1.3,0.6,2.5,1.3,3.5,2.3
                              c1,1,1.8,2.1,2.3,3.4C201.4,74.8,201.7,76.2,201.7,77.8z M186.9,77.8c0,1.1,0.4,2.1,1.1,2.9c0.8,0.8,1.7,1.2,2.7,1.2
                              c1,0,1.9-0.4,2.7-1.2c0.8-0.8,1.1-1.7,1.1-2.9c0-1.1-0.4-2.1-1.1-2.9c-0.8-0.8-1.7-1.2-2.7-1.2c-1,0-1.9,0.4-2.7,1.2
                              C187.2,75.7,186.9,76.6,186.9,77.8z" />
                                            <path class="st1" d="M214.9,67c1.1,0,2.1,0.1,3,0.4c0.9,0.2,1.7,0.6,2.4,0.9c0.7,0.4,1.3,0.8,1.8,1.3c0.5,0.5,1,1,1.3,1.5
                              c0.8,1.2,1.4,2.6,1.8,4.1l-7,0.7c-0.2-0.4-0.4-0.8-0.8-1.1c-0.3-0.3-0.6-0.5-1.1-0.8c-0.4-0.2-1-0.4-1.5-0.4c-1,0-1.9,0.4-2.7,1.2
                              c-0.8,0.8-1.1,1.7-1.1,2.9c0,1.1,0.4,2.1,1.1,2.9c0.8,0.8,1.7,1.2,2.7,1.2c0.6,0,1.1-0.1,1.5-0.3c0.4-0.2,0.8-0.5,1.1-0.8
                              c0.3-0.3,0.6-0.7,0.8-1.1l7,0.7c-0.4,1.6-1,3-1.8,4.2c-0.4,0.5-0.8,1-1.3,1.5c-0.5,0.5-1.1,0.9-1.8,1.3c-0.7,0.4-1.5,0.7-2.4,0.9
                              c-0.9,0.2-1.9,0.4-3,0.4c-1.6,0-3-0.3-4.4-0.8c-1.3-0.6-2.5-1.3-3.5-2.3c-1-1-1.8-2.1-2.3-3.4c-0.6-1.3-0.8-2.7-0.8-4.2
                              c0-1.5,0.3-2.9,0.8-4.2c0.6-1.3,1.3-2.4,2.3-3.4c1-1,2.1-1.7,3.5-2.3C211.9,67.3,213.3,67,214.9,67z" />
                                            <path class="st1" d="M237.4,67c1.3,0,2.6,0.2,3.7,0.6c1.1,0.4,2.1,1,2.8,1.8c0.8,0.8,1.4,1.7,1.8,2.7c0.4,1,0.7,2.2,0.7,3.4v12.6
                              h-5.2c-0.2-0.3-0.3-0.5-0.4-0.8c-0.1-0.2-0.2-0.4-0.4-0.7c-0.1-0.2-0.2-0.4-0.3-0.6c-0.5,0.5-1.1,0.9-1.8,1.3
                              c-0.5,0.3-1.2,0.6-1.9,0.9c-0.7,0.2-1.5,0.4-2.4,0.4c-1.1,0-2-0.2-2.9-0.5c-0.9-0.3-1.6-0.7-2.2-1.3c-0.6-0.6-1.1-1.2-1.4-1.9
                              c-0.3-0.7-0.5-1.5-0.5-2.4c0-1,0.2-1.9,0.6-2.7c0.4-0.8,1.1-1.6,2.1-2.2c1-0.6,2.2-1.1,3.7-1.5c1.5-0.4,3.4-0.6,5.7-0.6
                              c0-0.8-0.2-1.4-0.6-1.8c-0.4-0.4-0.9-0.7-1.4-0.7c-0.4,0-0.8,0.1-1.1,0.2c-0.3,0.2-0.5,0.4-0.7,0.6c-0.2,0.2-0.4,0.5-0.4,0.8
                              l-7-0.7c0.2-1.3,0.7-2.4,1.5-3.5c0.3-0.4,0.7-0.9,1.2-1.3c0.5-0.4,1-0.8,1.7-1.1c0.6-0.3,1.4-0.6,2.2-0.8
                              C235.3,67.1,236.3,67,237.4,67z M236.2,83.1c0.8,0,1.5-0.3,2-0.9c0.6-0.6,0.9-1.3,0.9-2.2v-0.7c-1,0-1.8,0.1-2.5,0.2
                              c-0.6,0.1-1.1,0.3-1.5,0.4c-0.4,0.2-0.6,0.4-0.7,0.7c-0.1,0.3-0.2,0.6-0.2,0.9c0,0.4,0.2,0.8,0.5,1.1
                              C235.1,83,235.6,83.1,236.2,83.1z" />
                                            <path class="st1" d="M257.4,88.1h-7.2V59.8h7.2V88.1z" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php // include __DIR__.'/_sidebar_2.php'; 
            ?>
            <div class="main-content">

                <div class="section">
                    <div class="section">
                        <h2 class=" text-center"><?= Yii::t('app', 'Bem-vindo!') ?></h2>
                        <p class="section-lead text-center">
                            <?= Yii::t('app', 'Complete estes dados para configurar a sua conta') ?>.
                        </p>
                    </div>
                    <div class="row">
                        <div class=" col-lg-8 offset-lg-2 col-md-12">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="row mt-4">
                                        <div class="d-sm-block col-12 col-lg-10 offset-lg-1">
                                            <div class="wizard-steps">

                                                <?php
                                                foreach (Yii::$app->controller->side_nav->menu as $it) {
                                                    $item = (object) $it;

                                                ?>
                                                    <div class="wizard-step <?= @$item->active ? 'wizard-step-active d-xs-block d-sm-block col-12 col-lg-10 offset-lg-1' : 'd-none d-sm-block col-12 col-lg-10 offset-lg-1'; ?>">
                                                        <div class="wizard-step-icon">
                                                            <i class="<?= $item->icon; ?>"></i>
                                                        </div>
                                                        <div class="wizard-step-label">
                                                            <?= $item->name; ?>
                                                        </div>
                                                    </div>
                                                <?php }

                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <?= $content; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include __DIR__ . '/_scripts.php'; ?>

    <!-- General JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <?php $this->endBody(); ?>

</body>

</html>
<?php $this->endPage(); ?>
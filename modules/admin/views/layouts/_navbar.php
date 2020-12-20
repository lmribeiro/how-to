<?php

use yii\helpers\Url;

?>
<!--<div class="navbar-bg"></div>-->
<nav class="navbar navbar-expand-lg main">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" id="toggle-sidebar" class="nav-link nav-link-lg"><i
                            class="fas fa-bars"></i></a></li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li>
            <a href="<?= Url::to(['/']) ?>" class="nav-link nav-link-lg">
                <i class="fas fa-graduation-cap"></i>
                <span><?= Yii::t('app', 'Knowledge Base') ?></span>
            </a>
        </li>


        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle menu-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?= Yii::$app->user->identity->getThumb('avatar', 'thumb', true); ?>"
                     class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">
                    <?= Yii::t('app', 'Olá'); ?>
                    <?= Yii::$app->user->identity->name; ?>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <div class="dropdown-title"><?= Yii::t('app', 'Tema'); ?></div>
                <?php if (Yii::$app->session->get('theme')) { ?>
                    <a class="dropdown-item"
                       href="<?= Url::to(['/site/theme', 'id' => false]); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
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
                       href="<?= Url::to(['/site/theme', 'id' => true]); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
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
                    <?php $n['divider'] ? '<div class="dropdown-divider"></div>' : ''; ?>
                <?php } ?>

            </div>
        </li>
    </ul>
</nav>

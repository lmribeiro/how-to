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


        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle menu-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?= Yii::$app->user->identity->getThumb('avatar', 'thumb', true); ?>"
                     class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block"><?= Yii::t('app', 'Olá'); ?> <?= Yii::$app->user->identity->name; ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <?php foreach (Yii::$app->controller->top_nav as $n) { ?>
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

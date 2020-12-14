<?php

use yii\helpers\Url;

?>
<div class="main-sidebar" style="overflow: hidden;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <h1 style="margin-top: 10px;">
                <a href="<?= Yii::$app->homeUrl ?>">
                    HOW-TO
                </a>
            </h1>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <h4 style="margin-top: 20px;">
                <a href="<?= Yii::$app->homeUrl ?>">
                    H-T
                </a>
            </h4>
        </div>
        <ul class="sidebar-menu">

            <?php foreach (Yii::$app->controller->side_nav as $n) { ?>
                <li class="menu-header"><?= $n['name']; ?></li>
                <?php foreach ($n['items'] as $item) { ?>
                    <?php if (!$item['hasItems']) { ?>
                        <li class="nav-item <?= in_array(Yii::$app->controller->id, $item['active']) ? 'active' : ''; ?>">
                            <a class="nav-link" href="<?= Url::to([$item['id'].'/index']); ?>" data-placement="right">
                                <i class="<?= $item['icon']; ?>"></i>
                                <span><?= $item['name']; ?></span>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="nav-link has-dropdown <?= in_array(Yii::$app->controller->id, $item['active']) ? 'active' : ''; ?>" data-toggle="dropdown">
                                <i class="<?= $item['icon']; ?>"></i>
                                <span><?= $item['name']; ?></span>
                            </a>
                            <ul class="dropdown-menu" style="display: block;">
                                <?php foreach ($item['items'] as $i) {

                                    ?>
                                    <a href="<?= Url::to($i['id'].'/index'); ?>"
                                       class="nav-link <?= in_array(Yii::$app->controller->id, $i['active']) ? 'active' : ''; ?>">
                                        <span><?= $i['name']; ?></span>
                                    </a>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </ul>
    </aside>
</div>

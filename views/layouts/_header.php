<?php

use yii\helpers\Html;
use yii\helpers\Url;
$color = "#A81917";
if (Yii::$app->session->get('color')) {
    $color = Yii::$app->session->get('color');
}
?>
<meta charset="<?= Yii::$app->charset; ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="<?= $color ?>">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="<?= $color ?>">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="<?= $color ?>">

<?php $this->registerCsrfMetaTags(); ?>
<title><?= Html::encode($this->title); ?></title>

<!-- General CSS Files -->
<script src="https://kit.fontawesome.com/52c8abb5f6.js" crossorigin="anonymous"></script>
<script src="<?= Url::to(['@web/js/jquery-3.5.1.slim.min.js', true]) ?>" ></script>

<link rel="apple-touch-icon" sizes="57x57" href="<?= Url::to('@web/images/favicon/apple-icon-57x57.png', true) ?>">
<link rel="apple-touch-icon" sizes="60x60" href="<?= Url::to('@web/images/favicon/apple-icon-60x60.png', true) ?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?= Url::to('@web/images/favicon/apple-icon-72x72.png', true) ?>">
<link rel="apple-touch-icon" sizes="76x76" href="<?= Url::to('@web/images/favicon/apple-icon-76x76.png', true) ?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?= Url::to('@web/images/favicon/apple-icon-114x114.png', true) ?>">
<link rel="apple-touch-icon" sizes="120x120" href="<?= Url::to('@web/images/favicon/apple-icon-120x120.png', true) ?>">
<link rel="apple-touch-icon" sizes="144x144" href="<?= Url::to('@web/images/favicon/apple-icon-144x144.png', true) ?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?= Url::to('@web/images/favicon/apple-icon-152x152.png', true) ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?= Url::to('@web/images/favicon/apple-icon-180x180.png', true) ?>">
<link rel="icon" type="image/png" sizes="192x192"  href="<?= Url::to('@web/images/favicon/android-icon-192x192.png', true) ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?= Url::to('@web/images/favicon/favicon-32x32.png', true) ?>">
<link rel="icon" type="image/png" sizes="96x96" href="<?= Url::to('@web/images/favicon/favicon-96x96.png', true) ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?= Url::to('@web/images/favicon/favicon-16x16.png', true) ?>">
<link rel="manifest" href="<?= Url::to('@web/images/favicon/manifest.json', true) ?>">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?= Url::to('@web/images/favicon/ms-icon-144x144.png', true) ?>">
<meta name="theme-color" content="#ffffff">

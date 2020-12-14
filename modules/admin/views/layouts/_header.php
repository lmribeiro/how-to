<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<meta charset="<?= Yii::$app->charset; ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#A81917">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#A81917">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#A81917">

<?php $this->registerCsrfMetaTags(); ?>
<title><?= Html::encode($this->title); ?></title>

<!-- General CSS Files -->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

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
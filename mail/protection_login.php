<?php

use yii\helpers\Html;
use app\components\CurtosService;

/* @var $this yii\web\View */
/* @var $admin app\models\Admin */

// $curtos = new CurtosService();
// $link = $curtos->getShortLink(Yii::$app->urlManager->createAbsoluteUrl([
// 	'admin/auth/reset-password'
// ]));

// $resetLink = $link->short;
$resetLink = Yii::$app->urlManager->createAbsoluteUrl([
	'admin/auth/reset-password'
]);
?>
<p><b><?= Yii::t('app', 'Proteção login') ?>!</b></p>
<br />

<?= Yii::t('app', 'Olá'); ?> <?= Html::encode($user->name) ?>,<br /><br />
<?= Yii::t('app', 'Informamos que foram detectadas sucessivas falhas de autenticação na sua conta. Seguem abaixo os detalhes.'); ?>
<br />
<br />

<b><?= Html::encode(Yii::t('app', 'Plataforma')); ?>:</b> <?= Html::encode(ucfirst($login['platform'])) ?><br />
<b><?= Html::encode(Yii::t('app', 'Sistema Operativo')); ?>:</b> <?= Html::encode(ucfirst($login['os'])) ?><br />
<b><?= Html::encode(Yii::t('app', 'Browser')); ?>:</b> <?= Html::encode(ucfirst($login['browser'])) ?><br />
<b><?= Html::encode(Yii::t('app', 'Browser Version')); ?>:</b> <?= Html::encode($login['browser_version']) ?><br />
<b><?= Html::encode(Yii::t('app', 'IP')); ?>:</b> <?= Html::encode($login['ip']) ?><br />
<b><?= Html::encode(Yii::t('app', 'Data')); ?>:</b> <?= Html::encode($login['date']) ?><br />
<br />

<?= Yii::t('app', 'Se não foi você, não precisa de fazer nada, só queríamos alertá-lo.') ?><br />
<?= Yii::t('app', 'Se foi você, saiba que pode pedir uma recuperação de pasword.') ?>
<br />
<br />
<br />

<?= Html::a(Yii::t('app', 'Recuperar Password'), $resetLink, ['class' => 'button']) ?>
<br />
<br />
<br />

<?= Yii::t('app', 'Este é um processo automático, mas se tiver alguma dúvida basta responder a este email. Teremos todo o gosto em ajudar.') ?>
<br />
<br />

<?= Yii::t('app', 'Cumprimentos') ?>,<br />
<?= Yii::t('app', 'A equipa') ?> <?= Yii::$app->name ?>.
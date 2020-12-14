<?php

use yii\helpers\Html;
use app\components\CurtosService;

/* @var $this yii\web\View */
/* @var $admin app\models\Admin */

// $curtos = new CurtosService();
// $link = $curtos->getShortLink(Yii::$app->urlManager->createAbsoluteUrl([
// 	'admin/auth/set-password',
// 	'token' => $admin->password_reset_token
// ]));

// $resetLink = $link->short;
$resetLink = Yii::$app->urlManager->createAbsoluteUrl([
	'admin/auth/set-password',
	'token' => $admin->password_reset_token
]);
?>

<p><b><?= Yii::t('app', 'Bem-vindo!') ?></b></p>
<br />

<?= Yii::t('app', 'Olá'); ?> <?= Html::encode($admin->name) ?>,
<br /><br />
<?= Yii::t('app', 'Foi-lhe dado acesso ao nosso serviço. Bem-vindo a bordo!'); ?>&nbsp;
<?= Yii::t('app', 'Clique no botão abaixo para definir a password e validar a sua conta.'); ?><br />
<br />
<?= Html::a(Yii::t('app', 'Definir Password'), $resetLink, ['class' => 'button']) ?>
<br />
<br />
<?= Yii::t('app', 'Se o botão não funcionar, por favor clique no link abaixo.') ?>
<br />
<br />

<?= Html::a($resetLink, $resetLink) ?>
<br />
<br />

<?= Yii::t('app', 'Este é um processo automático, mas se tiver alguma dúvida basta responder a este email. Teremos todo o gosto em ajudar.') ?>
<br />
<br />

<?= Yii::t('app', 'Obrigado por usar o nosso serviço.') ?><br />
<br />
<?= Yii::t('app', 'Cumprimentos') ?>,<br />
<?= Yii::t('app', 'A equipa') ?> <?= Yii::$app->name ?>.
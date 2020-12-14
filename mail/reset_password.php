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
<p><b><?= Yii::t('app', 'Recuperar Password') ?>!</b></p>
<br />

<?= Yii::t('app', 'Olá'); ?> <?= Html::encode($admin->name) ?>,<br /><br />
<?= Yii::t('app', 'Recebemos recentemente o seu pedido para recuperar a password. Clique no botão abaixo para inserir uma nova password.'); ?>
<br />
<br />

<?= Html::a(Yii::t('app', 'Recuperar Password'), $resetLink, ['class' => 'button']) ?>
<br />
<br />
<br />

<?= Yii::t('app', 'Se o botão não funcionar, por favor clique no link abaixo.') ?>
<br />
<br />

<?= Html::a($resetLink, $resetLink) ?>
<br />
<br />

<?= Yii::t('app', 'Recomendamos que altere a senha periodicamente usando uma password compatível com padrões de segurança que contenha letras maiúsculas e minúsculas, números e símbolos.') ?>
<br />
<br />

<?= Yii::t('app', 'Este é um processo automático, mas se tiver alguma dúvida basta responder a este email. Teremos todo o gosto em ajudar.') ?>
<br />
<br />

<?= Yii::t('app', 'Cumprimentos') ?>,<br />
<?= Yii::t('app', 'A equipa') ?> <?= Yii::$app->name ?>.
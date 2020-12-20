<?php
/* @var $this yii\web\View */
/* @var $admin app\models\Admin */

use yii\helpers\Html;
use app\components\CurtosService;

// $curtos = new CurtosService();
// $link = $curtos->getShortLink(Yii::$app->urlManager->createAbsoluteUrl([
// 	'admin/auth/verify-account',
// 	'key' => $admin->auth_key
// ]));

// $resetLink = $link->short;
$resetLink = Yii::$app->urlManager->createAbsoluteUrl([
	'auth/verify-account',
	'key' => $admin->auth_key
]);

?>
<p><b><?= Yii::t('app', 'Bem-vindo!') ?></b></p>
<br />

<?= Yii::t('app', 'Olá!'); ?>,
<br /><br />
<?= Yii::t('app', 'Bem-vindo e obrigado por se inscrever! Estamos muito contentes por o ter a bordo.'); ?>&nbsp;
<?= Yii::t('app', 'Clique no botão abaixo para completar o seu perfil e configurar a sua conta.'); ?><br />
<br />
<?= Html::a(Yii::t('app', 'Validar conta'), $resetLink, ['class' => 'button']) ?>
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

<?= Yii::t('app', 'Cumprimentos') ?>,<br />
<?= Yii::t('app', 'A equipa') ?> <?= Yii::$app->name ?>.

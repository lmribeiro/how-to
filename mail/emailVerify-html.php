<?php

use yii\helpers\Html;

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $customer->verification_token]);
?>
<p><b><?= Yii::t('app', 'Bem-vindo!') ?></b></p>
<br />

<?= Yii::t('app', 'Olá'); ?> <?= Html::encode($customer->first_name) ?>,
<br /><br />
<?= Yii::t('app', 'Clique no botão abaixo para validar a sua conta.'); ?><br />
<br />
<?= Html::a(Yii::t('app', 'Validar Conta'), $verifyLink, ['class' => 'button']) ?>
<br />
<br />
<?= Yii::t('app', 'Se o botão não funcionar, por favor clique no link abaixo.') ?>
<br />
<br />

<?= Html::a($verifyLink, $verifyLink) ?>
<br />
<br />

<?= Yii::t('app', 'Este é um processo automático, mas se tiver alguma dúvida basta responder a este email. Teremos todo o gosto em ajudar.') ?>
<br />
<?= Yii::t('app', 'Obrigado') ?>,<br />
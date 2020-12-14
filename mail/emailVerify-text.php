<?php

use yii\helpers\Html;

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $customer->verification_token]);
?>
<?= Yii::t('app', 'Olá'); ?> <?= Html::encode($customer->first_name) ?>,
<br /><br />
<?= Yii::t('app', 'Segue o link abaixo para validar a sua conta.'); ?><br />
<br />
<?= $verifyLink ?>
<br />
<br />

<?= Yii::t('app', 'Este é um processo automático, mas se tiver alguma dúvida basta responder a este email. Teremos todo o gosto em ajudar.') ?>
<br />
<?= Yii::t('app', 'Obrigado') ?>,<br />
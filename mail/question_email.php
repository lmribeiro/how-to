<?php

/* @var $this yii\web\View */
/* @var $admin app\models\Admin */

?>
<p><b><?= Yii::t('app', 'Questão') ?>!</b></p>
<br/>

<?= Yii::t('app', 'Olá!'); ?>,<br/><br/>
<?= Yii::t('app', 'Recebemos recentemente um pedido de resposta para os seguintes detalhes:'); ?>
<br/>
<br/>

<?= Yii::t('app', 'Email');?>: <?= $email;?><br/>
<?= Yii::t('app', 'Questão');?>: <?= $question;?><br/>
<br/>

<?= Yii::t('app', 'Obrigado') ?>,<br/>
<?= Yii::$app->name ?>.

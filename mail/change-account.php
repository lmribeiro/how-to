<?php
/* @var $this yii\web\View */
/* @var $admin app\models\Admin */

?>

<p><b><?= Yii::t('app', 'Mudança de Conta') ?>!</b></p>
<br/>

<?= Yii::t('app', 'Olá!'); ?>,<br/><br/>
<?= Yii::t('app', 'Recebemos recentemente um pedido para alteração de conta com os seguintes detalhes:'); ?>
<br/>
<br/>

<?= Yii::t('app', 'Comerciante');?>: <?= $merchant->name;?><br/>
<?= Yii::t('app', 'Tipo de conta');?>: <?= $merchant->merchant_type;?><br/>
<?= Yii::t('app', 'Tipo de conta a mudar');?>: <?= $account;?><br/>
<br/>

<?= Yii::t('app', 'Obrigado') ?>,<br/>
<?= Yii::t('app', 'A equipa') ?> <?= Yii::$app->name ?>.
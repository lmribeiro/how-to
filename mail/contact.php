<?php
/* @var $this yii\web\View */
/* @var $admin app\models\Admin */

?>

<p><b><?= Yii::t('app', 'Contacto pelo site') ?>!</b></p>
<br/>

<?= Yii::t('app', 'Olá!'); ?>,
<br/><br/>
<?= Yii::t('app', 'Recebeu um novo pedido de contacto pelo site'); ?>
<br/>
<br/>

<b><?= Yii::t('app', 'Contacto'); ?>:</b> <?= $number; ?>
<br/>
<br/>

<?= Yii::t('app', 'Obrigado') ?>,<br/>
<?= Yii::$app->name ?>.
<?php

use yii\helpers\Html;

?>

<?php if ($tags) : ?>
	<?php foreach ($tags as $tag) : ?>
		<?= Html::a($tag->name, ['tag/view', 'id' => $tag->id], ['class' => 'badge badge-light']) ?>
	<?php endforeach; ?>
<?php else : ?>
	<p class="text-muted"><?= Yii::t('app', 'Nenhuma tag encontrada') ?></p>
<?php endif; ?>
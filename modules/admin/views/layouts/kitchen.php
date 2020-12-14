<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\KitchenAsset;
use app\widgets\Alert;

KitchenAsset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">

<head>
	<?php include __DIR__ . '/_header.php'; ?>
	<?php $this->head(); ?>
</head>

<body class="skin-reverse <?= Yii::$app->session->get('my_theme') ? 'skin-dark' : ''; ?> sidebar-mini">
	<?php $this->beginBody(); ?>

	<?= Alert::widget(); ?>

	<div id="app">
		<div class="main-wrapper main-wrapper-1">

			<?php include __DIR__ . '/_sidebar.php'; ?>

			<div class="main-content" style="padding-top: 10px;">
				<div class="section">
					<?= $content; ?>
				</div>
			</div>
		</div>
	</div>
	<?php $this->endBody(); ?>
</body>

</html>
<?php $this->endPage(); ?>

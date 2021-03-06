<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */

$this->title = Yii::t('app', 'Criar').' '.Yii::t('app', 'Administrador');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administradores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">

    <div class="card-header">
        <h4><?= Html::encode($this->title) ?></h4>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

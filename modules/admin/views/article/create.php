<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = Yii::t('app', 'Criar Artigo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Knowledge Base'), 'url' => ['knowledge-base/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artigos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="card">
    <div class="card-header">
        <h4><?= Html::encode($this->title) ?></h4>
    </div>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>
</div>

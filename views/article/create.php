<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = Yii::t('app', 'Adicionar Artigo');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="card">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>
</div>

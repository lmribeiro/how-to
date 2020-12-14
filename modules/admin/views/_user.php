<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->params['modals'][] = 'modal';
\yii\web\YiiAsset::register($this);

if ($model->date_of_birth) {
    $tz = new DateTimeZone('Europe/Lisbon');
    $age = DateTime::createFromFormat('Y-m-d', $model->date_of_birth, $tz)
                    ->diff(new DateTime('now', $tz))
            ->y;
    $years = "| $age ".Yii::t('app', 'Anos');
}

?>

<div class="card-header">
    <h4><?= Html::encode($model->name); ?></h4>
    <div class="card-header-action">
        <?= Html::a('<i class="fas fa-edit"></i> '.Yii::t('app', 'Editar'), ['user/update', 'id' => $model->id], ['class' => 'btn btn-icon icon-left btn-warning']); ?>
        <?= Html::a('<i class="fas fa-trash"></i> '.Yii::t('app', 'Apagar'), '#', ['class' => 'btn btn-icon icon-left btn-danger btn-delete', 'data-url' => 'user/delete', 'data-id' => $model->id, 'data-toggle' => 'modal', 'data-target' => '#delete_modal']); ?>
    </div>
</div>

<div class="card-body">
    <header class="page-cover">
        <div class="row">
            <div class="col-2 text-left">
                <p>
                    <?= $model->status ? '<span class="badge badge-success" style="margin-right: 7px;">Ativo</span>' : '<span class="badge badge-danger" style="margin-right: 7px;">Inativo</span>'; ?>
                </p>
            </div>
            <div class="col-8 text-center">
                <figure class="text-center avatar avatar-xl">
                    <img src="<?= $model->image ? $model->image : Url::to(['@web/images/placeholder/admin/avatar.png', true]); ?>" alt="" style="max-width:250px;max-height:150px;">
                </figure>
            </div>
            <div class="col-2 text-right">
                <p>
                </p>
            </div>
        </div>
        <div class="text-center">
            <h2 class="h4 mt-3 mb-0">
                <?= $model->name; ?>
            </h2>
            <p>
                <?php if ($model->email) { ?>
                    <?= $model->email; ?>
                    <i class="fas fa-<?= $model->email_is_valid ? 'check' : 'times'; ?> <?= $model->email_is_valid ? 'text-success' : 'text-danger'; ?>"></i>
                    <br/>
                <?php } ?>
                <?php if ($model->phone) { ?>
                    <?= $model->phone; ?>
                    <i class="fas fa-<?= $model->phone_is_valid ? 'check' : 'times'; ?> <?= $model->phone_is_valid ? 'text-success' : 'text-danger'; ?>"></i>
                <?php } ?>
            </p>
            <p>
                <?php
                switch ($model->gender) {
                    case 'm':
                        echo '<i class="fas fa-mars text-info"></i>';
                        break;
                    case 'f':
                        echo '<i class="fas fa-venus text-danger"></i>';
                        break;
                    default :
                        echo '<i class="fas fa-genderless text-muted"></i>';
                        break;
                }

                ?>

                <?= isset($years) ? $years : ''; ?>
            </p>
            <p>
                <span class="badge badge-<?= $model->accepts_push_notifications ? 'success' : 'danger'; ?>">
                    <i class="fas fa-arrow-up"></i>
                </span>
                <span class="badge badge-success text-uppercase">
                    <?= $model->language; ?>
                </span>
            </p>
            <p>
            <div class="text-<?= $model->is_logged ? 'success' : 'danger'; ?> text-small font-600-bold">
                <i class="fas fa-circle"></i>
                <?= Yii::t('app', $model->is_logged ? 'Online' : 'Offline'); ?>
                <?php if ($model->is_logged) { ?>
                    <?= Yii::t('app', 'desde') ?>
                    <?= date('d-m-Y', strtotime($model->latest_login)); ?>
                <?php } ?>
            </div>
            </p>
        </div>
    </header>
</div>



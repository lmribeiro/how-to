<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Settings */

$this->title = Yii::t('app', 'Definições Gerais');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Definições'), 'url' => ['settings/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="card">

    <div class="card-header">
        <h4><?= Html::encode($this->title) ?></h4>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="card-body">
        <div class="">
            <h5 class="section-title"><?= Yii::t('app', 'Emails') ?></h5>
        </div>
        <?= $form->field($model, 'admin_email')->textInput() ?>
        <?= $form->field($model, 'faqs_email')->textInput() ?>
        <?= $form->field($model, 'noreplay_email')->textInput() ?>
        <?= $form->field($model, 'error_report_email')->textInput() ?>
        <div class="">
            <h5 class="section-title"><?= Yii::t('app', 'Condições de Utilização e Política de Privacidade') ?></h5>
        </div>
        <br />
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pt-tab" data-toggle="tab" href="#pt" role="tab" aria-controls="pt" aria-selected="true">PT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="en-tab" data-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="false">EN</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane active" id="pt" role="tabpanel" aria-labelledby="pt-tab">
                <div class="form-group">
                    <?= Html::a(Yii::t('app', 'Ver') . ' <i class="fas fa-external-link-alt"></i>', ['/terms'], ['class' => 'float-right', 'target' => "_blank"]); ?>
                    <?= $form->field($model, 'terms_pt')->widget(CKEditor::className(), [
                        'preset' => 'custom',
                        'clientOptions' => [
                            'toolbarGroups' => [
                                ['name' => 'document', 'groups' => ['mode', 'document', 'doctools']],
                                ['name' => 'tools'],
                                ['name' => 'clipboard', 'groups' => ['undo', 'clipboard']],
                                ['name' => 'basicstyles', 'groups' => ['styles', 'basicstyles', 'cleanup']],
                                ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'bidi']],
                                ['name' => 'links', 'groups' => ['links', 'insert']],
                                ['name' => 'editing', 'groups' => ['find', 'selection', 'spellchecker']],
                            ],
                        ],
                    ]); ?>
                </div>
                <div class="form-group">
                    <?= Html::a(Yii::t('app', 'Ver') . ' <i class="fas fa-external-link-alt"></i>', ['/privacy'], ['class' => 'float-right', 'target' => "_blank"]); ?>
                    <?= $form->field($model, 'privacy_pt')->widget(CKEditor::className(), [
                        'preset' => 'custom',
                        'clientOptions' => [
                            'toolbarGroups' => [
                                ['name' => 'document', 'groups' => ['mode', 'document', 'doctools']],
                                ['name' => 'tools'],
                                ['name' => 'clipboard', 'groups' => ['undo', 'clipboard']],
                                ['name' => 'basicstyles', 'groups' => ['styles', 'basicstyles', 'cleanup']],
                                ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'bidi']],
                                ['name' => 'links', 'groups' => ['links', 'insert']],
                                ['name' => 'editing', 'groups' => ['find', 'selection', 'spellchecker']],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>

            <div class="tab-pane" id="en" role="tabpanel" aria-labelledby="en-tab">
                <div class="form-group">
                    <?= Html::a(Yii::t('app', 'Ver') . ' <i class="fas fa-external-link-alt"></i>', ['/terms'], ['class' => 'float-right', 'target' => "_blank"]); ?>
                    <?= $form->field($model, 'terms_en')->widget(CKEditor::className(), [
                        'preset' => 'custom',
                        'clientOptions' => [
                            'toolbarGroups' => [
                                ['name' => 'document', 'groups' => ['mode', 'document', 'doctools']],
                                ['name' => 'tools'],
                                ['name' => 'clipboard', 'groups' => ['undo', 'clipboard']],
                                ['name' => 'basicstyles', 'groups' => ['styles', 'basicstyles', 'cleanup']],
                                ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'bidi']],
                                ['name' => 'links', 'groups' => ['links', 'insert']],
                                ['name' => 'editing', 'groups' => ['find', 'selection', 'spellchecker']],
                            ],
                        ],
                    ]); ?>
                </div>
                <div class="form-group">
                    <?= Html::a(Yii::t('app', 'Ver') . ' <i class="fas fa-external-link-alt"></i>', ['/privacy'], ['class' => 'float-right', 'target' => "_blank"]); ?>
                    <?= $form->field($model, 'privacy_en')->widget(CKEditor::className(), [
                        'preset' => 'custom',
                        'clientOptions' => [
                            'toolbarGroups' => [
                                ['name' => 'document', 'groups' => ['mode', 'document', 'doctools']],
                                ['name' => 'tools'],
                                ['name' => 'clipboard', 'groups' => ['undo', 'clipboard']],
                                ['name' => 'basicstyles', 'groups' => ['styles', 'basicstyles', 'cleanup']],
                                ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'bidi']],
                                ['name' => 'links', 'groups' => ['links', 'insert']],
                                ['name' => 'editing', 'groups' => ['find', 'selection', 'spellchecker']],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
            
        </div>
    </div>

    <div class="float">
        <?php include __DIR__ . '../../_save.php'; ?>
    </div>
    <?php ActiveForm::end(); ?>
</div><?php if (Yii::$app->session->get('my_theme')) {

        ?>
    <?php include __DIR__ . '../../_ckeditor.php'; ?>
<?php
        }

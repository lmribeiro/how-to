<?php

use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Faq */
/* @var $form yii\widgets\ActiveForm */
/* @var $faqCategories app\models\FaqCategory[] */

?>

<?php $form = ActiveForm::begin(); ?>
    <div class="card-body">
        <?= $form->field($model, 'faq_category_id')->widget(Select2::className(), [
            'data' => ArrayHelper::map($faqCategories, 'id', 'name'),
            'options' => [
                'placeholder' => Yii::t('app', 'Selecione uma opção'),
            ],
        ]) ?>

        <?= $form->field($model, 'question')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'answer')->widget(CKEditor::className(), Yii::$app->params['ckeditorSimpleConfig']); ?>
    </div>

<?php include __DIR__ . '../../_save.php'; ?>
<?php ActiveForm::end(); ?>

<?php if (Yii::$app->session->get('theme')) { ?>
    <?php include __DIR__ . '../../_ckeditor.php'; ?>
<?php } ?>

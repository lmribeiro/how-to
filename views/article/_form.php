<?php

use app\models\ArticleCategory;
use app\models\ArticleTags;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
/* @var $tags ArticleTags */

?>

<?php $form = ActiveForm::begin(); ?>
<div class="card-body">
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'article_category_id')->widget(Select2::className(), [
                'data' => ArrayHelper::map(ArticleCategory::find()->all(), 'id', 'name'),
                'options' => [
                    'placeholder' => Yii::t('app', 'Selecione uma opção'),
                ],
            ]) ?>
        </div>
    </div>

    <?= $form->field($model, 'text')->widget(CKEditor::className(), Yii::$app->params['ckeditorSimpleConfig']); ?>

    <?=
    $form->field($model, 'articleTags')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(ArticleTags::find()->all(), 'id', 'name'),
        'options' => [
            'value' => $model->isNewRecord ? '' : $tags,
            'placeholder' => Yii::t('app', 'Selecione uma opção'),
            'multiple' => true
        ],
    ])->label(Yii::t('app', 'Tags'));

    ?>
</div>
<div class="card-footer text-right">
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success', 'type' => 'submit']); ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

<?php if (Yii::$app->session->get('theme')) { ?>
    <?php include __DIR__ . '/_ckeditor.php'; ?>
<?php } ?>

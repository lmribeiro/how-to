<?php

use kartik\select2\Select2;

?>
<div class="row">
    <div class="col">
        <?=
        $form->field($model, 'role')->widget(Select2::classname(), [
            'data' => [
                'ADMIN' => Yii::t('app', 'Administrador'),
                'EDITOR' => Yii::t('app', 'Editor'),
                'VIEWER' => Yii::t('app', 'Utilizador')
            ],
            'hideSearch' => true,
            'options' => [
                'value' => $model->role,
                'multiple' => false,
                'placeholder' => Yii::t('app', 'Selecione uma opção'),
            ],
        ]);
        ?>
    </div>
</div>

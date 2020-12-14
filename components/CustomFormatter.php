<?php

namespace app\components;

use Yii;

class CustomFormatter extends \yii\i18n\Formatter
{
    public function asEmpty($value)
    {
        return "";
    }
    public function asLabel($value)
    {
        // translate your int value to something else...
        switch ($value) {
            case 0:
                return '<span style="min-width:50px" class="badge badge-danger">'.Yii::t('app', 'Não').'</span>';
            case 1:
                return '<span style="min-width:50px" class="badge badge-success">'.Yii::t('app', 'Sim').'</span>';
            default:
                return '';
        }
    }

    public function asActive($value)
    {
        // translate your int value to something else...
        switch ($value) {
            case 0:
                return '<span style="min-width:50px" class="badge badge-danger">'.Yii::t('app', 'Inativo').'</span>';
            case 1:
                return '<span style="min-width:50px" class="badge badge-success">'.Yii::t('app', 'Ativo').'</span>';
            default:
                return '';
        }
    }
    
    public function asActiva($value)
    {
        // translate your int value to something else...
        switch ($value) {
            case 0:
                return '<span style="min-width:50px" class="badge badge-danger">'.Yii::t('app', 'Inativa').'</span>';
            case 1:
                return '<span style="min-width:50px" class="badge badge-success">'.Yii::t('app', 'Ativa').'</span>';
            default:
                return '';
        }
    }

    public function asUser($user, $nameAttributes = ['name', 'surname'])
    {
        $name = '';
        foreach ($nameAttributes as $value) {
            $name .= $user->{$value}.' ';
        }
        $name = substr($name, 0, -1);

        return \yii\helpers\Html::a($name, ['/user/view', 'id' => $user->id]);
    }

    public function asLinkUser($user, $value)
    {
        if ($value) {
            return \yii\helpers\Html::a($value, ['/user/view', 'id' => $user->id]);
        } else {
            return $this->asUser($user);
        }
    }

    public function asAddress($value)
    {
        return isset($value) ? $value->fullAddress() : Yii::t('app', '(não definido)');
    }

    public function asImages($value)
    {
        $images = [];
        foreach ($value as $img) {
            $images[] = [
                'src' => $img,
            ];
        }

        return \slavkovrn\imagecarousel\ImageCarouselWidget::widget([
            'id' => 'slide-image',
            'width' => '100%',             // width of widget container
            'height' => 250,            // height of widget container
            'img_width' => 375,         // width of central image
            'img_height' => 250,
            'images' => $images,
        ]);
    }
}

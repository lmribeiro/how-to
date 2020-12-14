<?php
namespace app\widgets;

use Yii;
use yii\base\Widget;

class BooleanLabelReverse extends Widget
{
    public $value;

    public function init()
    {
        parent::init();

        if ($this->value === 0) {
            $this->value =
                '<span class="badge badge-success">' .
                Yii::t('app', 'Não') .
                '</span>';
        } else {
            $this->value =
                '<span class="badge badge-danger">' .
                Yii::t('app', 'Sim') .
                '</span>';
        }
    }

    public function run()
    {
        return $this->value;
    }
}

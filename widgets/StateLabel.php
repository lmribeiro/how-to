<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;

class StateLabel extends Widget
{
    public $value;

    public function init()
    {
        parent::init();

        switch ($this->value) {
            case 'WAITING_PAYMENT':
                $this->value = "<span class='badge badge-secondary'>" . Yii::t('app', 'Em Pagamento') . "</span>";
                break;
            case 'SUBMITED':
                $this->value = "<span class='badge badge-info'>" . Yii::t('app', 'Submetido') . "</span>";
                break;
            case 'PROCESSING':
                $this->value = "<span class='badge badge-warning'>" . Yii::t('app', 'Em Processamento') . "</span>";
                break;
            case 'DONE':
                $this->value = "<span class='badge badge-success'>" . Yii::t('app', 'Concluído') . "</span>";
                break;
        }
    }

    public static function data()
    {
        return [
            'WAITING_PAYMENT' => Yii::t('app', 'Em Pagamento'),
            'SUBMITED' => Yii::t('app', 'Submetido'),
            'PROCESSING' => Yii::t('app', 'Em Processamento'),
            'DONE' => Yii::t('app', 'Concluído'),
        ];
    }

    public function run()
    {
        return $this->value;
    }
}

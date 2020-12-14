<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;

class StatusLabel extends Widget
{
	public $value;

	public function init()
	{
		parent::init();

		switch ($this->value) {
			case 0:
				$this->value = '<span class="badge badge-danger">' . Yii::t('app', 'Inativo') . '</span>';
				break;
			case 1:
				$this->value = '<span class="badge badge-success">' . Yii::t('app', 'Ativo') . '</span>';
				break;
		}
	}

	public function run()
	{
		return $this->value;
	}
}

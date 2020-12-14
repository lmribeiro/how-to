<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;

class DefaultParams extends Model
{
	public $restaurant;

	public function rules()
	{
		return [
			[['restaurant'], 'safe']
		];
	}

	public function setParams()
	{
		foreach ($this->attributes as $key => $value) {
			Yii::$app->session->set($key, $value);
		}
	}
}

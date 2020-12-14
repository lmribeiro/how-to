<?php

namespace app\modules\admin\models;

use app\models\Restaurant;
use yii\base\Model;

class ImportFile extends Model
{
	public $restaurant_id;
	public $file;

	public function rules()
	{
		return [
			[['restaurant_id', 'file'], 'required'],
			['restaurant_id', 'integer'],
			[['file'], 'file', 'extensions' => 'csv', 'maxSize' => 1024 * 1024 * 5],
			[['restaurant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurant::className(), 'targetAttribute' => ['restaurant_id' => 'id']],
		];
	}

	public function attributeLabels()
	{
		return [
			'restaurant_id' => 'Restaurante',
			'file' => 'Ficheiro CSV',
		];
	}
}

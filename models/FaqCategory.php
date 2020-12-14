<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faq_category".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Faq[] $faqs
 * @property FaqCategoryLang[] $faqCategoryLangs
 */
class FaqCategory extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'faq_category';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['name'], 'required'],
			[['created_at', 'updated_at'], 'safe'],
			[['name'], 'string', 'max' => 255],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Nome'),
			'created_at' => Yii::t('app', 'Adicionada'),
			'updated_at' => Yii::t('app', 'Editada'),
		];
	}

	public function afterFind()
	{
		parent::afterFind();

		if (Yii::$app->language != 'pt') {
			$lang = Yii::$app->language;

			if ($translate = $this->getFaqCategoryLang($lang)->one()) {
				$this->name = $translate->name;
			}
		}
	}

	public function getFaqCategoryLang($lang)
	{
		return $this->hasOne(FaqCategoryLang::className(), ['faq_category_id' => 'id'])
			->onCondition(['language_code' => $lang]);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getFaqs()
	{
		return $this->hasMany(Faq::className(), ['faq_category_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getFaqCategoryLangs()
	{
		return $this->hasMany(FaqCategoryLang::className(), ['faq_category_id' => 'id']);
	}
}

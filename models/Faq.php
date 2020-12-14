<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property int $id
 * @property int $faq_category_id
 * @property string $question
 * @property string $answer
 * @property string $created_at
 * @property string $updated_at
 *
 * @property FaqCategory $faqCategory
 * @property FaqLang[] $faqLangs
 */
class Faq extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'faq';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['faq_category_id', 'question', 'answer'], 'required'],
			[['faq_category_id'], 'integer'],
			[['answer'], 'string'],
			[['created_at', 'updated_at'], 'safe'],
			[['question'], 'string', 'max' => 255],
			[['faq_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => FaqCategory::className(), 'targetAttribute' => ['faq_category_id' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'ID'),
			'faq_category_id' => Yii::t('app', 'Categoria'),
			'question' => Yii::t('app', 'Pergunta'),
			'answer' => Yii::t('app', 'Resposta'),
			'created_at' => Yii::t('app', 'Adicionada a'),
			'updated_at' => Yii::t('app', 'Editada a'),
		];
	}

	public function afterFind()
	{
		parent::afterFind();

		if (Yii::$app->language != 'pt') {
			$lang = Yii::$app->language;

			if ($translate = $this->getFaqLang($lang)->one()) {
				$this->question = $translate->question;
				$this->answer = $translate->answer;
			}
		}
	}

	public function getFaqLang($lang)
	{
		return $this->hasOne(CategoryLang::className(), ['faq_id' => 'id'])
			->onCondition(['language_code' => $lang]);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getFaqCategory()
	{
		return $this->hasOne(FaqCategory::className(), ['id' => 'faq_category_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getFaqLangs()
	{
		return $this->hasMany(FaqLang::className(), ['faq_id' => 'id']);
	}
}

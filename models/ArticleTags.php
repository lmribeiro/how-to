<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_tags".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ArticleTagsArticle[] $articleTagsArticles
 * @property Article[] $articles
 * @property ArticleTagsLang[] $articleTagsLangs
 */
class ArticleTags extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'article_tags';
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
			'created_at' => Yii::t('app', 'Adicionado'),
			'updated_at' => Yii::t('app', 'Editado'),
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getArticleTagsArticles()
	{
		return $this->hasMany(ArticleTagsArticle::className(), ['article_tag_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getArticles()
	{
		return $this->hasMany(Article::className(), ['id' => 'article_id'])->viaTable('article_tags_article', ['article_tag_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getArticleTagsLangs()
	{
		return $this->hasMany(ArticleTagsLang::className(), ['article_tags_id' => 'id']);
	}
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_tags_article".
 *
 * @property int $article_id
 * @property int $article_tag_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Article $article
 * @property ArticleTags $articleTag
 */
class ArticleTagsArticle extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'article_tags_article';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['article_id', 'article_tag_id'], 'required'],
			[['article_id', 'article_tag_id'], 'integer'],
			[['created_at', 'updated_at'], 'safe'],
			[['article_id', 'article_tag_id'], 'unique', 'targetAttribute' => ['article_id', 'article_tag_id']],
			[['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
			[['article_tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleTags::className(), 'targetAttribute' => ['article_tag_id' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'article_id' => Yii::t('app', 'Artigo'),
			'article_tag_id' => Yii::t('app', 'Tag'),
			'created_at' => Yii::t('app', 'Adicionado'),
			'updated_at' => Yii::t('app', 'Editado'),
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getArticle()
	{
		return $this->hasOne(Article::className(), ['id' => 'article_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getArticleTag()
	{
		return $this->hasOne(ArticleTags::className(), ['id' => 'article_tag_id']);
	}
}

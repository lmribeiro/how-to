<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property int $article_category_id
 * @property string $title
 * @property string $text
 * @property string $status
 * @property int $views
 * @property int $up_votes
 * @property int $down_votes
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ArticleCategory $articleCategory
 * @property ArticleTagsArticle[] $articleTagsArticles
 * @property ArticleTags[] $articleTags
 */
class Article extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'article';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['article_category_id', 'title', 'text'], 'required'],
			[['article_category_id', 'views', 'up_votes', 'down_votes'], 'integer'],
			[['text', 'status'], 'string'],
			[['created_at', 'updated_at'], 'safe'],
			[['title'], 'string', 'max' => 255],
			[['article_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleCategory::className(), 'targetAttribute' => ['article_category_id' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'ID'),
			'article_category_id' => Yii::t('app', 'Categoria'),
			'title' => Yii::t('app', 'Titulo'),
			'text' => Yii::t('app', 'Texto'),
			'status' => Yii::t('app', 'Estado'),
			'views' => Yii::t('app', 'Visualizações'),
			'up_votes' => Yii::t('app', 'Votos positivos'),
			'down_votes' => Yii::t('app', 'Votos negativos'),
			'created_at' => Yii::t('app', 'Adicionado'),
			'updated_at' => Yii::t('app', 'Editado'),
		];
	}


	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getArticleCategory()
	{
		return $this->hasOne(ArticleCategory::className(), ['id' => 'article_category_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getArticleTagsArticles()
	{
		return $this->hasMany(ArticleTagsArticle::className(), ['article_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getArticleTags()
	{
		return $this->hasMany(ArticleTags::className(), ['id' => 'article_tag_id'])->viaTable('article_tags_article', ['article_id' => 'id']);
	}

    public function relatedArticles()
    {
        $tags = ArticleTagsArticle::find()
            ->select('article_tag_id')
            ->where(['article_id' => $this->id])
            ->asArray()
            ->all();

        $tagsId = array_column($tags, 'article_tag_id');

        $articles = ArticleTagsArticle::find()
            ->select('count(*) as commontags, article_id')
            ->where(['!=', 'article_id', $this->id])
            ->andWhere(['IN', 'article_tag_id', $tagsId])
            ->groupBy('article_id')
            ->orderBy(['commontags' => SORT_DESC])
            ->all();

        return $articles;
    }

    public function excerpt($max_length = 250, $cut_off = '...', $keep_word = false)
    {
        $text = strip_tags($this->text, '<br><br/>');;

        if (strlen($text) <= $max_length) {
            return $text;
        }

        if (strlen($text) > $max_length) {
            if ($keep_word) {
                $text = substr($text, 0, $max_length + 1);

                if ($last_space = strrpos($text, ' ')) {
                    $text = substr($text, 0, $last_space);
                    $text = rtrim($text);
                    $text .=  $cut_off;
                }
            } else {
                $text = substr($text, 0, $max_length);
                $text = rtrim($text);
                $text .=  $cut_off;
            }
        }

        return $text;
    }
}

<?php

use yii\db\Migration;

/**
 * Class m201213_190606_create_table_article_tags_article
 */
class m201213_190606_create_table_article_tags_article extends Migration
{
    public function safeUp()
    {
        $this->createTable('article_tags_article', [
            'article_id' => $this->integer()->notNull(),
            'article_tag_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);

        $this->addPrimaryKey('pk-article_tags_article', '{{%article_tags_article}}', ['article_id', 'article_tag_id']);

        $this->addForeignKey('fk-article_tags_article-article', '{{%article_tags_article}}', 'article_id', '{{%article}}', 'id');
        $this->addForeignKey('fk-article_tags_article-article_tag', '{{%article_tags_article}}', 'article_tag_id', '{{%article_tags}}', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-article_tags_article-article', '{{%article_tags_article}}');
        $this->dropForeignKey('fk-article_tags_article-article_tag', '{{%article_tags_article}}');

        $this->dropTable('article_tags_article');
    }
}

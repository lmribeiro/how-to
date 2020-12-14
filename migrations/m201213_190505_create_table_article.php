<?php

use yii\db\Migration;

/**
 * Class m201213_190505_create_table_article
 */
class m201213_190505_create_table_article extends Migration
{
    public function safeUp()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'article_category_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'status' => "ENUM('DRAFT', 'REVIEW', 'PENDING', 'PUBLISHED', 'ARCHIVED') NOT NULL DEFAULT 'DRAFT'",
            'views' => $this->integer()->notNull()->defaultValue(0),
            'up_votes' => $this->integer()->notNull()->defaultValue(0),
            'down_votes' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);

       
        $this->addForeignKey('fk-article-article_category', '{{%article}}', 'article_category_id', '{{%article_category}}', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-article-article_category', '{{%article}}');

        $this->dropTable('article');
    }
}

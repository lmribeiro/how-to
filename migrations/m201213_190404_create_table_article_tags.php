<?php

use yii\db\Migration;

/**
 * Class m201213_190404_create_table_article_tags
 */
class m201213_190404_create_table_article_tags extends Migration
{
    public function safeUp()
    {
        $this->createTable('article_tags', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('article_tags');
    }
}

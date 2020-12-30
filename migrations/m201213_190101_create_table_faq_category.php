<?php

use yii\db\Migration;

/**
 * Class m201213_190101_create_table_faq_category
 */
class m201213_190101_create_table_faq_category extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%faq_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);

        $this->insert('{{%faq_category}}', ['name' => 'Geral']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%faq_category}}');
    }
}

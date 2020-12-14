<?php

use yii\db\Migration;

/**
 * Class m201213_190202_create_table_faq
 */
class m201213_190202_create_table_faq extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%faq}}', [
            'id' => $this->primaryKey(),
            'faq_category_id' => $this->integer()->notNull(),
            'question' => $this->string(255)->notNull(),
            'answer' => $this->text()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);

        $this->addForeignKey('fk-faq-faq_category', '{{%faq}}', 'faq_category_id', '{{%faq_category}}', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-faq-faq_category', '{{%faq}}');
        $this->dropTable('{{%faq}}');
    }
}

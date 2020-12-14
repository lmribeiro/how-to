<?php

use yii\db\Migration;

/**
 * Class m201213_190303_create_table_article_category
 */
class m201213_190303_create_table_article_category extends Migration
{
	public function safeUp()
	{
		$this->createTable('article_category', [
			'id' => $this->primaryKey(),
			'name' => $this->string(255)->notNull(),
			'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
			'updated_at' => $this->timestamp()->null()->append('ON UPDATE CURRENT_TIMESTAMP')
		]);
	}

	public function safeDown()
	{
		$this->dropTable('article_category');
	}
}

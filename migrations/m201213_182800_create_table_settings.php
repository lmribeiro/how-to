<?php

use yii\db\Migration;

class m201213_182800_create_table_settings extends Migration
{
	public function safeUp()
	{
		$this->createTable('{{%settings}}', [
			'key' => $this->string(255)->notNull(),
			'value' => $this->text()->null(),
			'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
			'updated_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP'),
			'deleted' => $this->smallInteger()->notNull()->defaultValue(0),
			'deleted_at' => $this->timestamp()->null()
		]);

		$this->addPrimaryKey('settings-pk', '{{%settings}}', 'key');
		$this->insert('{{%settings}}', ['key' => 'admin_email']);
	}

	public function safeDown()
	{
		$this->dropTable('{{%settings}}');
	}
}

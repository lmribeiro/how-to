<?php

use yii\db\Migration;

/**
 * Class m201213140202_create_table_admin
 */
class m201213_180202_create_table_admin extends Migration
{
	public function safeUp()
	{
		$this->createTable('{{%admin}}', [
			'id' => $this->primaryKey(),
			'username' => $this->string(255)->notNull(),
			'name' => $this->string(255)->null(),
			'email' => $this->string(255)->notNull(),
			'role' => "ENUM ('ADMIN', 'EDITOR', 'VIEWER') NOT NULL DEFAULT 'VIEWER'",
			'avatar' => $this->string(255)->null(),
			'avatar_path' => $this->string(255)->null(),
			'status' => $this->smallInteger()->notNull()->defaultValue(0),
			'auth_key' => $this->string(32)->notNull(),
			'password_hash' => $this->string(255)->null(),
			'password_reset_hash' => $this->string(255)->null(),
			'password_reset_token' => $this->string(255)->null(),
			'is_logged' => $this->smallInteger()->notNull()->defaultValue(0),
			'latest_login' => $this->timestamp()->null(),
			'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
			'updated_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP'),
			'deleted' => $this->smallInteger()->notNull()->defaultValue(0),
			'deleted_at' => $this->timestamp()->null()
		]);
	}

	public function safeDown()
	{
		$this->dropTable('{{%admin}}');
	}
}

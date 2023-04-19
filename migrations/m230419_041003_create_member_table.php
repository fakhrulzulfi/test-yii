<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%member}}`.
 */
class m230419_041003_create_member_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%member}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'phone' => $this->string(15)->notNull(),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s')),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%member}}');
    }
}

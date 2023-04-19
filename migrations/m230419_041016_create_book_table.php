<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m230419_041016_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'author' => $this->string(255),
            'year' => $this->smallInteger(),
            'count' => $this->smallInteger(),
            'is_available' => $this->boolean()->defaultValue(true),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s')),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book}}');
    }
}

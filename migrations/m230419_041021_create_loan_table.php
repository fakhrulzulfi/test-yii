<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%loan}}`.
 */
class m230419_041021_create_loan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%loan}}', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'member_id' => $this->integer()->notNull(),
            'date' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s')),
            'returned_on' => $this->dateTime(),
        ]);

        $this->createIndex(
            'idx-loan-book_id',
            'loan',
            'book_id'
        );

        $this->addForeignKey(
            'fk-loan-book_id',
            'loan',
            'book_id',
            'book',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-loan-member_id',
            'loan',
            'member_id'
        );

        $this->addForeignKey(
            'fk-loan-member_id',
            'loan',
            'member_id',
            'member',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-loan-book_id', 'loan');
        $this->dropIndex('idx-loan-book_id', 'loan');
        $this->dropForeignKey('fk-loan-member_id', 'loan');
        $this->dropIndex('idx-loan-member_id', 'loan');
        $this->dropTable('{{%loan}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Class m230419_043057_seed_book_table
 */
class m230419_043057_seed_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = \Faker\Factory::create();
        for ($i=0; $i < 10; $i++) { 
            $this->insert(
                'book',
                [
                    'name' => $faker->catchPhrase,
                    'author' => $faker->name,
                    'year' => (int) $faker->year,
                    'count' => 10,
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230419_043057_seed_book_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230419_043057_seed_book_table cannot be reverted.\n";

        return false;
    }
    */
}

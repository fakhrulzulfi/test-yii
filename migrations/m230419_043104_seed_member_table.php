<?php

use yii\db\Migration;

/**
 * Class m230419_043104_seed_member_table
 */
class m230419_043104_seed_member_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 10; $i++) { 
            $this->insert(
                'member',
                [
                    'name' => $faker->name,
                    'phone' => $faker->phoneNumber,
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230419_043104_seed_member_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230419_043104_seed_member_table cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m181201_203422_station
 */
class m181201_203422_station extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('station', [
            'id' => $this->primaryKey(),
            'number' => $this->integer(),
            'address' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181201_203422_station cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181201_203422_station cannot be reverted.\n";

        return false;
    }
    */
}

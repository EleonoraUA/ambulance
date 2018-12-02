<?php

use yii\db\Migration;

/**
 * Class m181201_204954_call
 */
class m181201_204954_call extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('calls', [
            'patient_id' => $this->integer()->notNull(),
            'address' => $this->string(),
            'comment' => $this->string(),
            'datetime' => $this->integer(),
            'isProfiled' => $this->boolean(),
            'diagnosys_id' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181201_204954_call cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181201_204954_call cannot be reverted.\n";

        return false;
    }
    */
}

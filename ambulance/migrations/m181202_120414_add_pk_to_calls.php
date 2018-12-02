<?php

use yii\db\Migration;

/**
 * Class m181202_120414_add_pk_to_calls
 */
class m181202_120414_add_pk_to_calls extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('calls', 'id', $this->primaryKey());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181202_120414_add_pk_to_calls cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181202_120414_add_pk_to_calls cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m181201_201306_diagnosis
 */
class m181201_201306_diagnosis extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('diagnosis', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'isAdult' => $this->boolean()->defaultValue(true),
            'isProfiled' => $this->boolean()->defaultValue(true),
            'priority' => $this->float(2)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('diagnosis');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181201_201306_diagnosis cannot be reverted.\n";

        return false;
    }
    */
}

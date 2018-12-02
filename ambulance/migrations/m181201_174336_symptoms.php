<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181201_174336_symptoms
 */
class m181201_174336_symptoms extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('symptoms', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('symptoms');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181201_174336_symptoms cannot be reverted.\n";

        return false;
    }
    */
}

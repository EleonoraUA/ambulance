<?php

use yii\db\Migration;

/**
 * Class m181201_202911_add_pk_patient
 */
class m181201_202911_add_pk_patient extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('patient', 'id', $this->primaryKey());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181201_202911_add_pk_patient cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181201_202911_add_pk_patient cannot be reverted.\n";

        return false;
    }
    */
}

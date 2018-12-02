<?php

use yii\db\Migration;

/**
 * Class m181201_202019_patient
 */
class m181201_202019_patient extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('patient', [
            'name' => $this->string(),
            'birthday' => $this->integer(),
            'address' => $this->text(),
            'phone' => $this->string(),
            'user_id' => $this->integer(),
            'isConfirmed' => $this->boolean()
        ]);

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-patient-user',
            'patient',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181201_202019_patient cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181201_202019_patient cannot be reverted.\n";

        return false;
    }
    */
}

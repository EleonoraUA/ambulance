<?php

use yii\db\Migration;

/**
 * Class m181201_203713_brigade
 */
class m181201_203713_brigade extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('brigades', [
            'id' => $this->primaryKey(),
            'number' => $this->integer(),
            'state' => $this->string()->defaultValue("Вільний"),
            'station_id' => $this->integer()->notNull(),
            'coordinates' => $this->string()
        ]);

        $this->addForeignKey(
            'fk-brigade-station',
            'brigades',
            'station_id',
            'station',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181201_203713_brigade cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181201_203713_brigade cannot be reverted.\n";

        return false;
    }
    */
}

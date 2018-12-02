<?php

use yii\db\Migration;

/**
 * Handles the creation of table `calls_symptoms`.
 * Has foreign keys to the tables:
 *
 * - `calls`
 * - `symptoms`
 */
class m181202_120449_create_junction_table_for_calls_and_symptoms_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('calls_symptoms', [
            'calls_id' => $this->integer(),
            'symptoms_id' => $this->integer(),
            'PRIMARY KEY(calls_id, symptoms_id)',
        ]);

        // creates index for column `calls_id`
        $this->createIndex(
            'idx-calls_symptoms-calls_id',
            'calls_symptoms',
            'calls_id'
        );

        // add foreign key for table `calls`
        $this->addForeignKey(
            'fk-calls_symptoms-calls_id',
            'calls_symptoms',
            'calls_id',
            'calls',
            'id',
            'CASCADE'
        );

        // creates index for column `symptoms_id`
        $this->createIndex(
            'idx-calls_symptoms-symptoms_id',
            'calls_symptoms',
            'symptoms_id'
        );

        // add foreign key for table `symptoms`
        $this->addForeignKey(
            'fk-calls_symptoms-symptoms_id',
            'calls_symptoms',
            'symptoms_id',
            'symptoms',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `calls`
        $this->dropForeignKey(
            'fk-calls_symptoms-calls_id',
            'calls_symptoms'
        );

        // drops index for column `calls_id`
        $this->dropIndex(
            'idx-calls_symptoms-calls_id',
            'calls_symptoms'
        );

        // drops foreign key for table `symptoms`
        $this->dropForeignKey(
            'fk-calls_symptoms-symptoms_id',
            'calls_symptoms'
        );

        // drops index for column `symptoms_id`
        $this->dropIndex(
            'idx-calls_symptoms-symptoms_id',
            'calls_symptoms'
        );

        $this->dropTable('calls_symptoms');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `calls_brigades`.
 * Has foreign keys to the tables:
 *
 * - `calls`
 * - `brigades`
 */
class m181202_120415_create_junction_table_for_calls_and_brigades_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('calls_brigades', [
            'calls_id' => $this->integer(),
            'brigades_id' => $this->integer(),
            'PRIMARY KEY(calls_id, brigades_id)',
        ]);

        // creates index for column `calls_id`
        $this->createIndex(
            'idx-calls_brigades-calls_id',
            'calls_brigades',
            'calls_id'
        );

        // add foreign key for table `calls`
        $this->addForeignKey(
            'fk-calls_brigades-calls_id',
            'calls_brigades',
            'calls_id',
            'calls',
            'id',
            'CASCADE'
        );

        // creates index for column `brigades_id`
        $this->createIndex(
            'idx-calls_brigades-brigades_id',
            'calls_brigades',
            'brigades_id'
        );

        // add foreign key for table `brigades`
        $this->addForeignKey(
            'fk-calls_brigades-brigades_id',
            'calls_brigades',
            'brigades_id',
            'brigades',
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
            'fk-calls_brigades-calls_id',
            'calls_brigades'
        );

        // drops index for column `calls_id`
        $this->dropIndex(
            'idx-calls_brigades-calls_id',
            'calls_brigades'
        );

        // drops foreign key for table `brigades`
        $this->dropForeignKey(
            'fk-calls_brigades-brigades_id',
            'calls_brigades'
        );

        // drops index for column `brigades_id`
        $this->dropIndex(
            'idx-calls_brigades-brigades_id',
            'calls_brigades'
        );

        $this->dropTable('calls_brigades');
    }
}

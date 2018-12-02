<?php

use yii\db\Migration;

/**
 * Handles the creation of table `diagnosis_brigades`.
 * Has foreign keys to the tables:
 *
 * - `diagnosis`
 * - `brigades`
 */
class m181202_120514_create_junction_table_for_diagnosis_and_brigades_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('diagnosis_brigades', [
            'diagnosis_id' => $this->integer(),
            'brigades_id' => $this->integer(),
            'PRIMARY KEY(diagnosis_id, brigades_id)',
        ]);

        // creates index for column `diagnosis_id`
        $this->createIndex(
            'idx-diagnosis_brigades-diagnosis_id',
            'diagnosis_brigades',
            'diagnosis_id'
        );

        // add foreign key for table `diagnosis`
        $this->addForeignKey(
            'fk-diagnosis_brigades-diagnosis_id',
            'diagnosis_brigades',
            'diagnosis_id',
            'diagnosis',
            'id',
            'CASCADE'
        );

        // creates index for column `brigades_id`
        $this->createIndex(
            'idx-diagnosis_brigades-brigades_id',
            'diagnosis_brigades',
            'brigades_id'
        );

        // add foreign key for table `brigades`
        $this->addForeignKey(
            'fk-diagnosis_brigades-brigades_id',
            'diagnosis_brigades',
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
        // drops foreign key for table `diagnosis`
        $this->dropForeignKey(
            'fk-diagnosis_brigades-diagnosis_id',
            'diagnosis_brigades'
        );

        // drops index for column `diagnosis_id`
        $this->dropIndex(
            'idx-diagnosis_brigades-diagnosis_id',
            'diagnosis_brigades'
        );

        // drops foreign key for table `brigades`
        $this->dropForeignKey(
            'fk-diagnosis_brigades-brigades_id',
            'diagnosis_brigades'
        );

        // drops index for column `brigades_id`
        $this->dropIndex(
            'idx-diagnosis_brigades-brigades_id',
            'diagnosis_brigades'
        );

        $this->dropTable('diagnosis_brigades');
    }
}

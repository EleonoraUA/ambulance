<?php

use yii\db\Migration;

/**
 * Handles the creation of table `diagnosis_symptoms`.
 * Has foreign keys to the tables:
 *
 * - `diagnosis`
 * - `symptoms`
 */
class m181202_120621_create_junction_table_for_diagnosis_and_symptoms_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('diagnosis_symptoms', [
            'diagnosis_id' => $this->integer(),
            'symptoms_id' => $this->integer(),
            'PRIMARY KEY(diagnosis_id, symptoms_id)',
        ]);

        // creates index for column `diagnosis_id`
        $this->createIndex(
            'idx-diagnosis_symptoms-diagnosis_id',
            'diagnosis_symptoms',
            'diagnosis_id'
        );

        // add foreign key for table `diagnosis`
        $this->addForeignKey(
            'fk-diagnosis_symptoms-diagnosis_id',
            'diagnosis_symptoms',
            'diagnosis_id',
            'diagnosis',
            'id',
            'CASCADE'
        );

        // creates index for column `symptoms_id`
        $this->createIndex(
            'idx-diagnosis_symptoms-symptoms_id',
            'diagnosis_symptoms',
            'symptoms_id'
        );

        // add foreign key for table `symptoms`
        $this->addForeignKey(
            'fk-diagnosis_symptoms-symptoms_id',
            'diagnosis_symptoms',
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
        // drops foreign key for table `diagnosis`
        $this->dropForeignKey(
            'fk-diagnosis_symptoms-diagnosis_id',
            'diagnosis_symptoms'
        );

        // drops index for column `diagnosis_id`
        $this->dropIndex(
            'idx-diagnosis_symptoms-diagnosis_id',
            'diagnosis_symptoms'
        );

        // drops foreign key for table `symptoms`
        $this->dropForeignKey(
            'fk-diagnosis_symptoms-symptoms_id',
            'diagnosis_symptoms'
        );

        // drops index for column `symptoms_id`
        $this->dropIndex(
            'idx-diagnosis_symptoms-symptoms_id',
            'diagnosis_symptoms'
        );

        $this->dropTable('diagnosis_symptoms');
    }
}

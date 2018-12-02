<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diagnosis_symptoms".
 *
 * @property int $diagnosis_id
 * @property int $symptoms_id
 *
 * @property Diagnosis $diagnosis
 * @property Symptoms $symptoms
 */
class DiagnosisSymptoms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnosis_symptoms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['diagnosis_id', 'symptoms_id'], 'required'],
            [['diagnosis_id', 'symptoms_id'], 'integer'],
            [['diagnosis_id', 'symptoms_id'], 'unique', 'targetAttribute' => ['diagnosis_id', 'symptoms_id']],
            [['diagnosis_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diagnosis::className(), 'targetAttribute' => ['diagnosis_id' => 'id']],
            [['symptoms_id'], 'exist', 'skipOnError' => true, 'targetClass' => Symptoms::className(), 'targetAttribute' => ['symptoms_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'diagnosis_id' => Yii::t('app', 'Діагноз'),
            'symptoms_id' => Yii::t('app', 'Симптом'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnosis()
    {
        return $this->hasOne(Diagnosis::className(), ['id' => 'diagnosis_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSymptoms()
    {
        return $this->hasOne(Symptoms::className(), ['id' => 'symptoms_id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calls_symptoms".
 *
 * @property int $calls_id
 * @property int $symptoms_id
 *
 * @property Calls $calls
 * @property Symptoms $symptoms
 */
class CallsSymptoms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calls_symptoms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calls_id', 'symptoms_id'], 'required'],
            [['calls_id', 'symptoms_id'], 'integer'],
            [['calls_id', 'symptoms_id'], 'unique', 'targetAttribute' => ['calls_id', 'symptoms_id']],
            [['calls_id'], 'exist', 'skipOnError' => true, 'targetClass' => Calls::className(), 'targetAttribute' => ['calls_id' => 'id']],
            [['symptoms_id'], 'exist', 'skipOnError' => true, 'targetClass' => Symptoms::className(), 'targetAttribute' => ['symptoms_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'calls_id' => Yii::t('app', 'Виклик'),
            'symptoms_id' => Yii::t('app', 'Симптоми'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalls()
    {
        return $this->hasOne(Calls::className(), ['id' => 'calls_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSymptoms()
    {
        return $this->hasOne(Symptoms::className(), ['id' => 'symptoms_id']);
    }
}

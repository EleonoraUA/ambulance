<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calls".
 *
 * @property int $patient_id
 * @property string $address
 * @property string $comment
 * @property int $datetime
 * @property int $isProfiled
 * @property int $diagnosys_id
 * @property int $id
 *
 * @property CallsBrigades[] $callsBrigades
 * @property Brigades[] $brigades
 * @property CallsSymptoms[] $callsSymptoms
 * @property Symptoms[] $symptoms
 */
class Calls extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calls';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patient_id', 'diagnosys_id'], 'required'],
            [['patient_id', 'isProfiled', 'diagnosys_id'], 'integer'],
            [['address', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'patient_id' => Yii::t('app', 'Пацієнт'),
            'address' => Yii::t('app', 'Адреса виклику'),
            'comment' => Yii::t('app', 'Коментар'),
            'datetime' => Yii::t('app', 'Дата та час'),
            'isProfiled' => Yii::t('app', 'Профільність'),
            'diagnosys_id' => Yii::t('app', 'Діагноз'),
            'id' => Yii::t('app', 'ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCallsBrigades()
    {
        return $this->hasMany(CallsBrigades::className(), ['calls_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrigades()
    {
        return $this->hasMany(Brigades::className(), ['id' => 'brigades_id'])->viaTable('calls_brigades', ['calls_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCallsSymptoms()
    {
        return $this->hasMany(CallsSymptoms::className(), ['calls_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSymptoms()
    {
        return $this->hasMany(Symptoms::className(), ['id' => 'symptoms_id'])->viaTable('calls_symptoms', ['calls_id' => 'id']);
    }
}

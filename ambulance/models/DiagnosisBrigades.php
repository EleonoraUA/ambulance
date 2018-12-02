<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diagnosis_brigades".
 *
 * @property int $diagnosis_id
 * @property int $brigades_id
 *
 * @property Brigades $brigades
 * @property Diagnosis $diagnosis
 */
class DiagnosisBrigades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnosis_brigades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['diagnosis_id', 'brigades_id'], 'required'],
            [['diagnosis_id', 'brigades_id'], 'integer'],
            [['diagnosis_id', 'brigades_id'], 'unique', 'targetAttribute' => ['diagnosis_id', 'brigades_id']],
            [['brigades_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brigades::className(), 'targetAttribute' => ['brigades_id' => 'id']],
            [['diagnosis_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diagnosis::className(), 'targetAttribute' => ['diagnosis_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'diagnosis_id' => Yii::t('app', 'Diagnosis ID'),
            'brigades_id' => Yii::t('app', 'Brigades ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrigades()
    {
        return $this->hasOne(Brigades::className(), ['id' => 'brigades_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnosis()
    {
        return $this->hasOne(Diagnosis::className(), ['id' => 'diagnosis_id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calls_brigades".
 *
 * @property int $calls_id
 * @property int $brigades_id
 *
 * @property Brigades $brigades
 * @property Calls $calls
 */
class CallsBrigades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calls_brigades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calls_id', 'brigades_id'], 'required'],
            [['calls_id', 'brigades_id'], 'integer'],
            [['calls_id', 'brigades_id'], 'unique', 'targetAttribute' => ['calls_id', 'brigades_id']],
            [['brigades_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brigades::className(), 'targetAttribute' => ['brigades_id' => 'id']],
            [['calls_id'], 'exist', 'skipOnError' => true, 'targetClass' => Calls::className(), 'targetAttribute' => ['calls_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'calls_id' => Yii::t('app', 'Calls ID'),
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
    public function getCalls()
    {
        return $this->hasOne(Calls::className(), ['id' => 'calls_id']);
    }
}

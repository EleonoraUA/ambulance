<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "brigades".
 *
 * @property int $id
 * @property int $number
 * @property string $state
 * @property int $station_id
 * @property string $coordinates
 *
 * @property Station $station
 */
class Brigades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brigades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'station_id'], 'integer'],
            [['station_id'], 'required'],
            [['state', 'coordinates'], 'string', 'max' => 255],
            [['station_id'], 'exist', 'skipOnError' => true, 'targetClass' => Station::className(), 'targetAttribute' => ['station_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'number' => Yii::t('app', 'Номер'),
            'state' => Yii::t('app', 'Статус'),
            'station_id' => Yii::t('app', 'Номер Підстанції'),
            'coordinates' => Yii::t('app', 'Місцеположення'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStation()
    {
        return $this->hasOne(Station::className(), ['id' => 'station_id']);
    }
}

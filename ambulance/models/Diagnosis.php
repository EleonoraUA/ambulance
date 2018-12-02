<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diagnosis".
 *
 * @property int $id
 * @property string $name
 * @property int $isAdult
 * @property int $isProfiled
 * @property double $priority
 */
class Diagnosis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnosis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'priority'], 'required'],
            [['isAdult', 'isProfiled'], 'integer'],
            [['priority'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'isAdult' => Yii::t('app', 'Is Adult'),
            'isProfiled' => Yii::t('app', 'Is Profiled'),
            'priority' => Yii::t('app', 'Priority'),
        ];
    }
}

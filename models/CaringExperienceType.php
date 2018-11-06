<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caring_experience_type".
 *
 * @property int $id
 * @property string $value
 * @property int $status 0=>inactive,1=>active,3=>delete
 */
class CaringExperienceType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caring_experience_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'string'],
            [['status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'status' => 'Status',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "available_time".
 *
 * @property string $id
 * @property string $user_id
 * @property int $type_id 2=carer,3=family
 * @property int $day_master_id
 * @property int $all_day 0=no,1=yes
 * @property string $start_time
 * @property string $end_time
 * @property int $status 0=inactive,1=>active,3=>delete
 */
class AvailableTime extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'available_time';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'day_master_id'], 'integer'],
            [['start_time', 'end_time'], 'safe'],
            [['type_id', 'all_day', 'status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'type_id' => 'Type ID',
            'day_master_id' => 'Day Master ID',
            'all_day' => 'All Day',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'status' => 'Status',
        ];
    }
}

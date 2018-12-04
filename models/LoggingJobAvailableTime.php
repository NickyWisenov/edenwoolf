<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logging_job_available_time".
 *
 * @property string $id
 * @property string $lagging_job_id
 * @property int $day_master_id
 * @property int $all_day 0=no,1=yes
 * @property string $start_time
 * @property string $end_time
 * @property int $status 0=inactive,1=>active,3=>delete
 */
class LoggingJobAvailableTime extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logging_job_available_time';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lagging_job_id', 'day_master_id'], 'integer'],
            [['start_time', 'end_time'], 'safe'],
            [['all_day', 'status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lagging_job_id' => 'Lagging Job ID',
            'day_master_id' => 'Day Master ID',
            'all_day' => 'All Day',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'status' => 'Status',
        ];
    }
}

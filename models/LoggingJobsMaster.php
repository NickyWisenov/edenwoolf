<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logging_jobs_master".
 *
 * @property string $id
 * @property string $family_id
 * @property string $carer_id
 * @property string $log_job_type
 * @property string $carer_type 1=>Childcare, 2=>Aged care, 3=>Disability care
 * @property string $carer_availability
 * @property string $carer_qualification
 * @property string $other_qualification
 * @property int $driver_license 1=>No, 2=>Yes, driver's license, 3=>Yes, driver's license + own car
 * @property string $carer_other_duties
 * @property string $duties_other_option Field when other_duties are select other option
 * @property int $carer_age_range 1=>Don't mind, 2=>Over 25 years of age, 3=>Over 30 years of age, 4=>Over 40 years of age
 * @property int $prefer_care_who_parent 1=>Yes, 2=>No, 3=>Don't mind(prefer a carer who is a parent)
 * @property int $carer_take_own_child 0=>No, 1=>Yes (carer taking their own children to work)
 * @property int $carering_exp Years of caring experience
 * @property string $exprience_type Type of experience
 * @property int $no_child_arrange_care 6=>greater than 5
 * @property string $children_ages
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class LoggingJobsMaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logging_jobs_master';
    }
    public $availableTiming;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['family_id', 'carer_id', 'log_job_type', 'carer_type', 'status'], 'required', 'message' => '{attribute} incomplete', 'on' => ['add-job-log']],
            [['family_id', 'carer_id', 'log_job_type', 'carer_type', 'carer_availability', 'other_qualification', 'carer_other_duties', 'duties_other_option', 'prefer_care_who_parent', 'exprience_type', 'children_ages', 'driver_license', 'carer_age_range', 'carer_take_own_child', 'carering_exp', 'no_child_arrange_care', 'status', 'created_at', 'updated_at'], 'safe','on' => ['add-job-log']],
            [['family_id', 'carer_id', 'log_job_type'], 'integer'],
            [['carer_qualification'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['carer_type', 'other_qualification', 'carer_other_duties', 'duties_other_option', 'exprience_type', 'children_ages'], 'string', 'max' => 250],
            [['driver_license', 'carer_age_range', 'prefer_care_who_parent', 'carer_take_own_child', 'carering_exp', 'no_child_arrange_care', 'status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'family_id' => 'Family ID',
            'carer_id' => 'Carer',
            'log_job_type' => 'Type of job',
            'carer_type' => 'Type of Carer',
            'carer_availability' => 'Carer Availability',
            'carer_qualification' => 'Carer Qualification',
            'other_qualification' => 'Other Qualification',
            'driver_license' => 'Driver License',
            'carer_other_duties' => 'Carer Other Duties',
            'duties_other_option' => 'Duties Other Option',
            'carer_age_range' => 'Carer Age Range',
            'prefer_care_who_parent' => 'Prefer Care Who Parent',
            'carer_take_own_child' => 'Carer Take Own Child',
            'carering_exp' => 'Carering Exp',
            'exprience_type' => 'Exprience Type',
            'no_child_arrange_care' => 'No Child Arrange Care',
            'children_ages' => 'Children Ages',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carar_details".
 *
 * @property string $id
 * @property string $user_id
 * @property string $care_type
 * @property string $job_type
 * @property int $number_care
 * @property string $certifications
 * @property int $drive_licence
 * @property int $caring_experience
 * @property string $type_of_experience
 * @property int $parent_status
 * @property int $take_children
 * @property string $other_task
 * @property string $native_language
 * @property string $other_language
 * @property string $description
 * @property string $id_image
 * @property string $updated_date
 */
class CarerDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carer_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'number_care', 'drive_licence', 'caring_experience', 'parent_status', 'take_children'], 'integer'],
            [['description'], 'string'],
            [['updated_date','parent_status','take_children','certifications','type_of_experience','other_language','other_task','description'], 'safe'],
//            [['job_type', 'certifications', 'type_of_experience', 'other_task', 'id_image'], 'string', 'max' => 255],
            
            //            update_profile_basic
            [['care_type','native_language'], 'required', 'message' => '{attribute} incomplete', 'on' => ['update_profile_basic']],
            [['job_type', 'number_care','caring_experience'], 'required', 'message' => '{attribute} incomplete', 'on' => ['update_profile_advanced']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'care_type' => 'Care Type',
            'job_type' => 'Job Type',
            'number_care' => 'Number Care',
            'certifications' => 'Certifications',
            'drive_licence' => 'Drive Licence',
            'caring_experience' => 'Caring Experience',
            'type_of_experience' => 'Type Of Experience',
            'parent_status' => 'Parent Status',
            'take_children' => 'Take Children',
            'other_task' => 'Other Task',
            'native_language' => 'Native Language',
            'other_language' => 'Other Language',
            'description' => 'Description',
            'id_image' => 'Id Image',
            'updated_date' => 'Updated Date',
        ];
    }
    
//============================== model relations ======================

    public function getNative_lang() {
        return $this->hasOne(Languages::className(), array("id" => "native_language"));
    }

    public function getuser_details() {
        return $this->hasOne(UserMaster::className(), array("id" => "user_id"));
    }
}

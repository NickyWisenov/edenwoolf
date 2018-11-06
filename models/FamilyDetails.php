<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "family_details".
 *
 * @property string $id
 * @property string $user_id
 * @property string $care_needed
 * @property string $person_name
 * @property string $dob_person
 * @property int $disability_type
 * @property string $other_problem
 * @property int $care_describe_type
 * @property int $carar_parent_status
 * @property int $carar_child_work
 * @property string $accomodation_type
 * @property string $other_task
 * @property double $able_topay
 * @property string $other_perk
 * @property string $description
 */
class FamilyDetails extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'family_details';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['care_needed'], 'required', 'message' => '{attribute} incomplete', 'on' => ['reg_family']],
            [['carer_parent_status', 'carer_child_work'], 'integer'],
            [['dob_person'], 'safe'],
            [['other_problem', 'description'], 'string'],
            [['pay_amount'], 'number','min'=>0,'message'=> '{attribute} is incorrect.'],
//            [['care_needed', 'person_name', 'accomodation_type', 'other_task', 'other_perk'], 'string', 'max' => 255],
//            [['care_needed'], 'required', 'message' => '{attribute} incomplete', 'on' => ['update_profile_basic_without_disablity']],
//            [['care_needed','disability_type'], 'required', 'message' => '{attribute} incomplete', 'on' => ['update_profile_basic_with_disablity']],
            [['care_needed','care_describe_type'], 'required', 'message' => '{attribute} incomplete', 'on' => ['update_care_info']],
            [['user_id','is_looking_found','care_needed','disability_type','care_looking_for','other_problem','care_describe_type','carer_parent_status','carer_child_work','accomodation_type','other_task','pay_amount','pay_type','negotiable','other_perk','description'], 'safe'],
            [['user_id','is_looking_found','care_needed','disability_type','care_looking_for','other_problem','care_describe_type','carer_parent_status','carer_child_work','accomodation_type','other_task','pay_amount','pay_type','negotiable','other_perk','description'], 'safe', 'on' => ['reg_family', 'update_care_info']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'care_needed' => 'Care needed',
            'person_name' => 'Person Name',
            'dob_person' => 'Dob Person',
            'disability_type' => 'Disability Type',
            'other_problem' => 'Other Problem',
            'care_describe_type' => 'Care description',
            'carar_parent_status' => 'Carer Parent Status',
            'carar_child_work' => 'Carer Child Work',
            'accomodation_type' => 'Accomodation Type',
            'other_task' => 'Other Task',
            'able_topay' => 'Able Topay',
            'other_perk' => 'Other Perk',
            'description' => 'Description',
        ];
    }
    public function getuser_details() {
        return $this->hasOne(UserMaster::className(), array("id" => "user_id"));
    }

}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "family_care_person".
 *
 * @property string $id
 * @property string $user_id
 * @property string $name
 * @property string $description
 * @property string $dob
 * @property int $status 0=>inactive,1=>active,3=>delete
 */
class FamilyCarePerson extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'family_care_person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['user_id', 'name', 'description', 'need_care', 'status'], 'safe'],
            [['user_id'], 'integer'],
            [['description'], 'string'],
            [['dob'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'description' => 'Description',
            'dob' => 'Dob',
            'status' => 'Status',
        ];
    }

}

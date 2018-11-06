<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "favourite_master".
 *
 * @property string $id
 * @property string $user_id
 * @property string $fav_id
 * @property string $user_type 1=>Carer, 2=>Family
 * @property string $status 0=>Inactive, 1=>Active, 3=>Delete
 * @property string $created_at
 * @property string $updated_at
 */
class FavouriteMaster extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'favourite_master';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'fav_id'], 'integer'],
            [['user_type', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'fav_id' => 'Fav ID',
            'user_type' => 'User Type',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getUser() {
        return $this->hasOne(UserMaster::className(), array("id" => "fav_id"));
    }

}

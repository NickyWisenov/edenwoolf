<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_id".
 *
 * @property integer $id
 * @property string $type
 */
class UserType extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'type_id';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['type'], 'required', 'message' => '{attribute} incomplete'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }

}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "looking_care_for".
 *
 * @property string $id
 * @property string $type
 * @property int $status 0=> inactive, 1=>active,  3=>delete
 * @property string $created_at
 * @property string $updated_at
 */
class LookingCareFor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'looking_care_for';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['type'], 'string', 'max' => 250],
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
            'type' => 'Type',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "children_age_master".
 *
 * @property string $id
 * @property string $age_range
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class ChildrenAgeMaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'children_age_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age_range'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'age_range' => 'Age Range',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

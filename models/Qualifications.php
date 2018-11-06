<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qualifications".
 *
 * @property int $id
 * @property string $value
 * @property int $status 0=>inactive,1=>active,3=>delete
 */
class Qualifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qualifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'string'],
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
            'value' => 'Value',
            'status' => 'Status',
        ];
    }
}

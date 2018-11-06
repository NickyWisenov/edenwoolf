<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job_description".
 *
 * @property int $id
 * @property string $value
 * @property int $status 0=>inactive,1=>active,3=>delete
 */
class JobDescription extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_description';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'required', 'message' => '{attribute} incomplete'],
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

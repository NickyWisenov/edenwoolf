<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "care_person_details".
 *
 * @property string $id
 * @property string $name
 * @property string $disabilities
 * @property string $d_o_b
 * @property string $created_at
 * @property string $updated_at
 */
class CarePersonDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'care_person_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['disabilities'], 'string'],
            [['d_o_b', 'created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'disabilities' => 'Disabilities',
            'd_o_b' => 'D O B',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

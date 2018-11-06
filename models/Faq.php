<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property string $id
 * @property string $question
 * @property string $answer
 * @property string $status 0=>Inactive, 1=>Active, 3=>Delete
 * @property string $created_at
 * @property string $updated_at
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['answer', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['question'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'answer' => 'Answer',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

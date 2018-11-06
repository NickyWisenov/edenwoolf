<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "email".
 *
 * @property string $id
 * @property string $email_code
 * @property string $about
 * @property string $subject
 * @property string $body
 * @property string $variable
 * @property string $added_at
 * @property string $updated_at
 */
class Email extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'email';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['about', 'subject', 'body'], 'required', 'message' => '{attribute} incomplete', 'on' => 'update'],
            [['body', 'variable'], 'string'],
            [['added_at', 'updated_at'], 'safe'],
            [['email_code'], 'string', 'max' => 100],
            [['about', 'subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'email_code' => 'Email Code',
            'about' => 'About',
            'subject' => 'Subject',
            'body' => 'Body',
            'variable' => 'Variable',
            'added_at' => 'Added At',
            'updated_at' => 'Updated At',
        ];
    }

}

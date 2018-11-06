<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact_us".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone_no
 * @property string $message
 * @property string $status
 * @property string $reply_message
 * @property string $reply_status
 * @property string $created_at
 * @property string $updated_at
 */
class ContactUs extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'contact_us';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'email', 'phone_no', 'message'], 'required', 'message' => '{attribute} incomplete', 'on' => ['contact']],
            [['name'], 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'Only contain word characters.', 'on' => ['contact']],
            [['reply_message'], 'required', 'message' => '{attribute} incomplete', 'on' => ['contact_reply']],
            ['email', 'email', 'on' => ['contact']],
            [['phone_no'], 'integer', 'on' => ['contact']],
            [['message', 'status', 'reply_message', 'reply_status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email'], 'string', 'max' => 100],
            [['phone_no'], 'string', 'max' => 20],
            [['reply_status', 'created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'phone_no' => Yii::t('app', 'Phone No'),
            'message' => Yii::t('app', 'Message'),
            'reply_message' => Yii::t('app', 'Reply Message'),
            'status' => Yii::t('app', 'Status'),
            'reply_status' => Yii::t('app', 'Reply Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}

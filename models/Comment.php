<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $blog_id
 * @property string $body
 * @property int $user_id
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id'], 'required'],
            [['blog_id', 'user_id'], 'integer'],
            [['body'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'blog_id' => 'Post ID',
            'body' => 'Body',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Get Post
     **/
    public function getBlog() {
        return $this->hasOne(Blog::className(), ['id' => 'blog_id']);
    }

    /**
     * Get User
     **/
    public function getUser() {
        return $this->hasOne(UserMaster::className(), ['id' => 'user_id']);
    }


    /**
    * Autoupdate created_at and updated_at fields.
    */

    public function beforeSave($insert)
    {

      if (parent::beforeSave($insert)) {

        if($insert) {
          $this->created_at = date('Y-m-d');
          $this->updated_at = date('Y-m-d');

        } else {
          $this->created_at = date('Y-m-d');
          $this->updated_at = date('Y-m-d');
        }
        return true;
      } else {
        return false;
      }
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $body
 * @property string $image
 * @property int $category_id
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'title'], 'required'],
            [['user_id', 'category_id'], 'integer'],
            [['body'], 'string'],
            [['title', 'subheading', 'image'], 'string', 'max' => 100],
            [['created_at', 'updated_at'], 'date'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'subheading' => 'Subheading',
            'body' => 'Body',
            'image' => 'Image',
            'category_id' => 'Category ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /*
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
    /**
     * Get Author
     **/
    public function getAuthor()
    {
        $author = UserMaster::find()
                ->where(['like', 'id', $this->user_id])
                ->one();
        return $author;
    }

    /**
     * Get User Master
     **/
    public function getUser()
    {
        return $this->hasOne(UserMaster::className(), ['id' => 'user_id']);
    }
    /**
    * Get Category
    **/
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);

    }

    /**
     * Get Comments
     **/
    public function getComments()
    {
      return $this->hasMany(Comment::className(), ['blog_id' => 'id']);
    }

    /**
     * Get Latest 3 blogs
     **/
    public function getMostRecentBlogs()
    {

      $blogs = $this->find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
      return $blogs;
      
      return $this->hasMany(Comment::className(), ['blog_id' => 'id']);
    }

}

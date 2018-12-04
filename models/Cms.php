<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cms".
 *
 * @property string $id
 * @property string $slug
 * @property string $page_name
 * @property string $content_name
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class Cms extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'cms';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['page_name', 'content_name'], 'required', 'message' => '{attribute} incomplete', 'when' => function($model) {
                    return $model->type == '1';
                }, 'on' => 'update_content'],
            [['content'], 'required', 'message' => '{attribute} incomplete', 'when' => function($model) {
                    return $model->type == '1';
                }, 'on' => 'update_content'],
                        
            [['page_name', 'content_name', 'content'], 'required', 'message' => '{attribute} incomplete', 'when' => function($model) {
                    return $model->type == '1';
                }, 'on' => 'update_image'],
                        
            [['page_name', 'content_name'], 'required', 'message' => '{attribute} incomplete', 'when' => function($model) {
                    return $model->type == '1';
                }, 'on' => 'update_content_help_text'],
                        
            [['content'], 'file', 'extensions' => 'png, jpg, jpeg', 'when' => function($model) {
                    return $model->type == '2';
                }, 'on' => 'update_image'],
            [['page_name', 'content_name', 'content'], 'required', 'message' => '{attribute} incomplete', 'when' => function($model) {
                    return $model->type == '1';
                }, 'on' => 'update_video'],
            [['content'], 'file', 'extensions' => 'mp4', 'when' => function($model) {
                    return $model->type == '3';
                }, 'on' => 'update_video'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['slug', 'page_name', 'content_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'page_name' => 'Page Name',
            'content_name' => 'Content Name',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}

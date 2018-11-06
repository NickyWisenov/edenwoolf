<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "static_pages".
 *
 * @property string $id
 * @property string $slug
 * @property string $page_name
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class StaticPages extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'static_pages';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['page_name', 'content'], 'required', 'message' => '{attribute} incomplete', 'on' => 'update'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['slug', 'page_name'], 'string', 'max' => 100],
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
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}

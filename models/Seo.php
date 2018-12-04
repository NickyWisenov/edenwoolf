<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property string $id
 * @property string $route
 * @property string $title
 * @property string $description
 * @property string $keyword
 */
class Seo extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'seo';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['description'], 'string'],
                [['route'], 'string', 'max' => 100],
                [['title'], 'string', 'max' => 200],
                [['keyword'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'route' => 'Route',
            'title' => 'Title',
            'description' => 'Description',
            'keyword' => 'Keyword',
        ];
    }

}

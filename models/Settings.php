<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property string $id
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property string $type
 * @property string $default
 * @property string $value
 * @property string $options
 * @property int $is_required
 * @property int $is_gui
 * @property string $module
 * @property int $row_order
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'type', 'default', 'value', 'options'], 'string'],
            [['is_required', 'is_gui', 'row_order'], 'integer'],
            [['slug', 'title'], 'string', 'max' => 100],
            [['module'], 'string', 'max' => 50],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'title' => 'Title',
            'description' => 'Description',
            'type' => 'Type',
            'default' => 'Default',
            'value' => 'Value',
            'options' => 'Options',
            'is_required' => 'Is Required',
            'is_gui' => 'Is Gui',
            'module' => 'Module',
            'row_order' => 'Row Order',
        ];
    }
}

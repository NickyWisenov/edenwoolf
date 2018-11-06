<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property string $language
 * @property string $translation
 */
class Message extends \yii\db\ActiveRecord {

    public $language_temp;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['translation'], 'required', 'message' => '{attribute} incomplete', 'on' => ['update']],
                [['id'], 'integer'],
                [['translation'], 'string'],
                [['language'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'language' => 'Language',
            'translation' => 'Content',
        ];
    }

}

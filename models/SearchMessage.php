<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "message".
 *
 */
class SearchMessage extends Message {

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
                [['translation'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
        ];
    }

    public function search($params) {
        $query = Message::find()->where('language = \'jp\'');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => ['defaultOrder' => ['id' => SORT_DESC],
                'attributes' => [
                    'id',
                    'translation',
                ]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'translation', $this->translation]);

        return $dataProvider;
    }

}

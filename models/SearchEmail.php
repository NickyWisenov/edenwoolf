<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "email".
 *
 */
class SearchEmail extends Email {

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
            [['about', 'subject', 'updated_at'], 'safe'],
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
        $query = Email::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => ['defaultOrder' => ['id' => SORT_DESC],
                'attributes' => [
                    'id',
                    'about',
                    'subject',
                    'updated_at',
                ]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'about', $this->about])
                ->andFilterWhere(['like', 'subject', $this->subject])
                ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }

}

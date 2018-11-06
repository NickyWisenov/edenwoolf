<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "seo".
 *
 */
class SearchSeo extends Seo {

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
                [['route', 'title', 'description', 'keyword'], 'safe'],
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
        $query = Seo::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => ['defaultOrder' => ['id' => SORT_DESC],
                'attributes' => [
                    'id',
                    'route',
                    'title',
                    'description',
                    'keyword',
                ]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'route', $this->route])
                ->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'keyword', $this->keyword]);

        return $dataProvider;
    }

}

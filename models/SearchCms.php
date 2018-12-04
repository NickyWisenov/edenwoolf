<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "cms".
 *
 */
class SearchCms extends Cms {

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
                [['slug', 'page_name', 'content_name', 'updated_at'], 'safe'],
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
        $query = Cms::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => ['defaultOrder' => ['id' => SORT_DESC],
                'attributes' => [
                    'id',
                    'slug',
                    'page_name',
                    'content_name',
                    'updated_at'
                ]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'slug', $this->slug])
                ->andFilterWhere(['like', 'page_name', $this->page_name])
                ->andFilterWhere(['like', 'content_name', $this->content_name])
                ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }

}

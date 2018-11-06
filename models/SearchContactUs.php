<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "contact_us".
 *
 */
class SearchContactUs extends ContactUs {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'contact_us';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['name', 'email', 'phone_no','reply_status','created_at'], 'safe'],
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
        $query = ContactUs::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => ['defaultOrder' => ['id' => SORT_DESC],
                'attributes' => [
                    'id',
                    'name',
                    'email',
                    'phone_no',
                    'created_at',
                    'reply_status',
                ]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'phone_no', $this->phone_no])
                ->andFilterWhere(['like', 'created_at', $this->created_at])
                ->andFilterWhere(['like', 'reply_status', $this->reply_status])
                ->andWhere('status <> \'3\'');

        return $dataProvider;
    }

}

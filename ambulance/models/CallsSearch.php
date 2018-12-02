<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Calls;

/**
 * CallsSearch represents the model behind the search form about `app\models\Calls`.
 */
class CallsSearch extends Calls
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id', 'datetime', 'diagnosys_id', 'id'], 'integer'],
            [['address', 'comment', 'isProfiled'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Calls::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'patient_id' => $this->patient_id,
            'datetime' => $this->datetime,
            'diagnosys_id' => $this->diagnosys_id,
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'isProfiled', $this->isProfiled]);

        return $dataProvider;
    }
}

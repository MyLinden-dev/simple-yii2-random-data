<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Delivery;

// use app\models\Supplier;
/**
 * DeliverySearch represents the model behind the search form of `app\models\Delivery`.
 */
class DeliverySearch extends Delivery
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_supplier', 'id_goods'], 'integer'],
            [['method', 'date_plan', 'date_real'], 'safe'],
            [['delivery_price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Delivery::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /**
        * Настройка параметров сортировки
        * Важно: должна быть выполнена раньше $this->load($params)
        * statement below
        */

        $dataProvider->sort->attributes['goods_title'] = [
            'asc' => ['goods.title' => SORT_ASC],
            'desc' => ['goods.title' => SORT_DESC],
            'default' => SORT_ASC
        ];

        $dataProvider->sort->attributes['supplier_company'] = [
            'asc' => ['supplier.company' => SORT_ASC],
            'desc' => ['supplier.company' => SORT_DESC],
            'default' => SORT_ASC
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['goods']);
            $query->joinWith(['supplier']);
            return $dataProvider;
        }

        $this->addCondition($query, 'id');
        $this->addCondition($query, 'id_goods');
        $this->addCondition($query, 'id_supplier');


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_supplier' => $this->id_supplier,
            'id_goods' => $this->id_goods,
            'date_plan' => $this->date_plan,
            'date_real' => $this->date_real,
            'delivery_price' => $this->delivery_price,
        ]);        

        $query->andFilterWhere(['like', 'method', $this->method]);


        // $query->joinWith(['goods' => function ($q) {
        //     $q->andFilterWhere(['ilike', 'goods.title', $this->goods_title]);
        // }]);

        // Фильтр по стране
        $query->joinWith(['goods' => function ($q) {
            $q->where('goods.title LIKE "%' . $this->goods_title . '%"');
        }]);

        $query->joinWith(['supplier' => function ($q) {
            $q->andFilterWhere(['ilike', 'supplier.company', $this->goods_title]);
        }]);

        

        return $dataProvider;
    }

    
    protected function addCondition($query, $attribute, $partialMatch = false)
    {
        if (($pos = strrpos($attribute, '.')) !== false) {
            $modelAttribute = substr($attribute, $pos + 1);
        } else {
            $modelAttribute = $attribute;
        }
    
        $value = $this->$modelAttribute;
        if (trim($value) === '') {
            return;
        }
    
        /*
        * Для корректной работы фильтра со связью со
        * свой же моделью делаем:
        */
        $attribute = "delivery.$attribute";
    
        if ($partialMatch) {
            $query->andWhere(['ilike', $attribute, $value]);
        } else {
            $query->andWhere([$attribute => $value]);
        }
    }
}

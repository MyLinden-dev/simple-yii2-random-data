<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery".
 *
 * @property int $id
 * @property int|null $id_supplier
 * @property int|null $id_goods
 * @property string|null $method
 * @property string|null $date_plan
 * @property string|null $date_real
 * @property float|null $delivery_price
 *
 * @property Goods $goods
 * @property Supplier $supplier
 */
class Delivery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery';
    }

    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_supplier', 'id_goods'], 'integer'],
            [['date_plan', 'date_real'], 'safe'],
            [['delivery_price'], 'number', 'min' => 1, 'max' => 20000],
            [['method'], 'string', 'max' => 255],
            [['id_goods'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['id_goods' => 'id']],
            [['id_supplier'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['id_supplier' => 'id']],
            [['goods_title', 'supplier_company'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_supplier' => 'Id Supplier',
            'id_goods' => 'Id Goods',
            'method' => 'Method',
            'date_plan' => 'Date Plan',
            'date_real' => 'Date Real',
            'delivery_price' => 'Delivery Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasOne(Goods::className(), ['id' => 'id_goods']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
     public function getGoods_title()
     {
         return $this->goods->title;
     }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id' => 'id_supplier']);
    }

         /**
     * @return \yii\db\ActiveQuery
     */
     public function getSupplier_company()
     {
         return $this->supplier->company;
     }

    /**
     * {@inheritdoc}
     * @return DeliveryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DeliveryQuery(get_called_class());
    }
    
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property int $id
 * @property string|null $company
 * @property string|null $contact_person
 * @property string|null $account
 * @property string|null $tel
 * @property string|null $fax
 *
 * @property Delivery[] $deliveries
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company'], 'string', 'max' => 255, 'min' => 3],
            [['contact_person'], 'string', 'max' => 50, 'min' => 3],
            [['account'], 'integer'],
            [['account'], 'string', 'max' => 20],
            [['tel'], 'integer'],
            [['tel'], 'string', 'max' => 12, 'min' => 7],
            [['fax'], 'integer'],
            [['fax'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company' => 'Company',
            'contact_person' => 'Contact Person',
            'account' => 'Account',
            'tel' => 'Tel',
            'fax' => 'Fax',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveries()
    {
        return $this->hasMany(Delivery::className(), ['id_supplier' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SupplierQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SupplierQuery(get_called_class());
    }
}

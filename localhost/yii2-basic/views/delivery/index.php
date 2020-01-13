<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Goods;
use app\models\Supplier;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DeliverySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Deliveries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Delivery', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'supplier.company',
            'goods.title',
            // [
            //     'attribute'=>'goods_title',
            //     'value' => function($data) {
            //         return $data->goods->title;
            //     },
            //     'filter' => ArrayHelper::map(Goods::find()->all(), 'id', 'title'),
            // ],
            'id_supplier',
            // [
            //     'attribute'=>'supplier_company',
            //     'value' => function($data) {
            //         return $data->supplier->company;
            //     },
            //     'filter' => ArrayHelper::map(Supplier::find()->all(), 'id', 'company'),
            // ],
            // 'id_goods',
            'method',
            'date_plan',
            //'date_real',
            'delivery_price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

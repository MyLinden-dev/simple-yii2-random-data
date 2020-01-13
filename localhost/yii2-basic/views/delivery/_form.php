<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Delivery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delivery-form">

    <?php $form = ActiveForm::begin(); ?> 
    
    <?= $form->field($model, 'id_supplier')->dropDownList(ArrayHelper::map($modelSupplier::find()->all(), 'id', 'company'))->label('Supplier') ?>

    <?= $form->field($model, 'id_goods')->dropDownList(ArrayHelper::map($modelGoods::find()->all(), 'id', 'title'))->label('Goods') ?>

    <?= $form->field($model, 'method')->textInput(['maxlength' => true]) ?>

<p><strong>Date Plan</strong></p>
    <?=$form->field(
        $model, "date_plan", [
            'template' => '{input}{error}{hint}'
        ]
    )->widget(
        \yii\widgets\MaskedInput::class, [
            'mask' => "y.2.1",
            'clientOptions' => [
                'alias' => 'datetime',
                "placeholder" => "yyyy.mm.dd",
                "separator" => "."
            ]
        ]
    );
?>
<p><strong>Date Real</strong></p>
    <?=$form->field(
        $model, "date_real", [
            'template' => '{input}{error}{hint}'
        ]
    )->widget(
        \yii\widgets\MaskedInput::class, [
            'mask' => "y.2.1",
            'clientOptions' => [
                'alias' => 'datetime',
                "placeholder" => "yyyy.mm.dd",
                "separator" => "."
            ]
        ]
    );
?>

    <?= $form->field($model, 'delivery_price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

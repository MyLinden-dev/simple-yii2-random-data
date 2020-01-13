<?php
use yii\helpers\Html;
use yii\helpers\CHtml;
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Лабораторная № 4</h1>
        <h3>по тестированию</h3>

        <p class="lead">Используйте меню для навигации между таблицами.</p>
        <br/>
<hr/>
<br/>
        <!-- <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button"
                aria-expanded="false" aria-controls="multiCollapseExample1">Тестирование нагрузки на сервис</a>
        </p> -->

            <!-- <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body"> -->

                            <?php $form = ActiveForm::begin(['method' => 'post', 'action' => ['site/add']]); ?>
                            <p>Добавление большого количества записей может занять около 2-ух минут.</p>
                            <label for="count">Введите количество записей</label>
                            <input type="number" id="count" name="count" min="1" max="10000">
                                <?= Html::submitButton('Добавить', ['class' => 'btn btn-sm btn-success']) ?>

                            <?php ActiveForm::end(); ?>
                            <?= $time ?>
                        <!-- </div>
                    </div>
                </div> -->

                <!-- <p>

        <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle first element</a>
            
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Toggle second element</button>

            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>
        </p>
            <div class="row">
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
                </div>
            </div>
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample2">
                <div class="card card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
                </div>
            </div>
            </div> -->

                <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
            </div>

    </div>
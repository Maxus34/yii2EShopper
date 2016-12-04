<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h2 class="title text-center"><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                'id',
                'created_at',
                'updated_at',
                'qty',
                'sum',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return !$data->status ? "<span class='text-danger'>Активен</span>" :
                        "<span class='text-success'>Завершен</span>";
                    },
                ],
                'name',
                'email:email',
                'phone',
                'address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

</div>

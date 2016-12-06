<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ESHOPER | Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h2 class="text-center title">Товары</h2>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            //'category_id',
            [
                'attribute' => 'category_id',
                'value' => function ($data) {
                    return $data->category->name;
                }
            ],
            'name',
            'price',
            [
                'attribute' => 'hit',
                'format' => 'raw',
                'value' => function ($data) {
                    return !$data->hit ? "<span class='text-warning'>Нет</span>" : "<span class='text-success'>Да</span>";
                }
            ],
            [
                'attribute' => 'new',
                'format' => 'raw',
                'value' => function ($data) {
                    return !$data->new ? "<span class='text-warning'>Нет</span>" : "<span class='text-success'>Да</span>";
                }
            ],
            [
                'attribute' => 'sale',
                'format' => 'raw',
                'value' => function ($data) {
                    return !$data->sale ? "<span class='text-warning'>Нет</span>" : "<span class='text-success'>Да</span>";
                }
            ],
             //'keywords',
             //'description',
             // 'img',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $img = $model->getImage(); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'category_id',
                'value' => $model->category->name,
            ],
            'name',
            [
                'attribute' => 'content',
                'format' => 'html',
            ],

            'price',
            'keywords',
            'description',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => "<img src='{$img->getUrl()}'>",
            ],
            [
                'attribute' => 'hit',
                'format' => 'raw',
                'value' => !$model->hit ? "<span class='text-danger'>Нет</span>" : "<span class='text-success'>Да</span>",
            ],
            [
                'attribute' => 'new',
                'format' => 'raw',
                'value' => !$model->new ? "<span class='text-danger'>Нет</span>" : "<span class='text-success'>Да</span>",
            ],
            [
                'attribute' => 'sale',
                'format' => 'raw',
                'value' => !$model->sale ? "<span class='text-danger'>Нет</span>" : "<span class='text-success'>Да</span>",
            ],
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = "Заказ #".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>Просмотр заказа № <?=$model->id?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
           // 'status',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => !$model->status ? "<span class='text-danger'>Активен</span>" :
                    "<span class='text-success'>Завершен</span>",
            ],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>

    <h2 class="text-center title">Список товаров</h2>

    <section id="cart_items">
        <div class="cart_info table-responsive ">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="description">Наименование</td>
                    <td class="quantity">Количество</td>
                    <td class="price">Цена</td>
                    <td class="">Сумма</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($model->orderItems as $item): ?>
                    <tr>
                        <td class="cart-description">
                            <a href="<?=\yii\helpers\Url::to(['/product/view', 'id' => $item['product_id']]); ?>">
                                <?= $item['name'] ?>
                            </a>
                        </td>

                        <td class="cart_quantity">
                            <input class="cart_quantity_input" type="text" name="quantity"
                                   value="<?= $item['qty_item'] ?>" size="2" disabled>
                        </td>

                        <td class="cart-price">
                            <p>$<?= $item['price'] ?></p>
                        </td>
                        <td class="cart-total">
                            <p class="cart_total_price">$<?= $item['sum_item'] ?></p>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

</div>

<section id="cart_items">
    <?php if(!empty($session['cart'])): ?>
        <div class="cart_info table-responsive ">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Наименование</td>
                        <td class="quantity">Кол-во</td>
                        <td class="price">Цена</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($session['cart'] as $id => $item):?>
                        <tr>
                            <td class="cart-product">
                                <a href="<?=yii\helpers\Url::to(['product/view', 'id'=>$id]);?>">
                                    <?=\yii\helpers\Html::img("@web/images/products/{$item['img']}") ?>
                                </a>
                            </td>
                            <td class="cart-description">
                                <h4><?=$item['name']?></h4>
                            </td>
                            <td class="cart_price">
                                <p><?=$item['qty']?></p>
                            </td>
                            <td class="cart-total">
                                <p class="cart_total_price">$<?=$item['price']?></p>
                            </td>
                            <td style="padding:10px"><i class="fa fa-times del-item" data-id="<?=$id?>"></i></td>
                        </tr>
                    <?php endforeach; ?>
                        <tr>
                            <td colspan="3"><h4>Итого</h4></td>
                            <td colspan="2"><?=$session['cart.qty']?> шт</td>
                        </tr>
                        <tr>
                            <td colspan="3"><h4>На сумму</h4></td>
                            <td colspan="2">$<?=$session['cart.sum']?></td>
                        </tr>
                </tbody>
            </table>
        </div>

        <?php else: ?>
            <h4 class="text-center text-success">Корзина пуста</h4>
    <?php endif; ?>
</section>
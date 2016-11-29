<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
?>

<div id="cart" class="container">
    <?php if($session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $session->getFlash('success'); ?>
        </div>
    <?php endif; ?>
    <?php if($session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $session->getFlash('error'); ?>
        </div>
    <?php endif; ?>
    <h2 class="title text-center">Ваша корзина</h2>
    <section id="cart_items">
        <?php if(!empty($session['cart'])): ?>
            <div class="cart_info table-responsive ">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image"></td>
                        <td class="description">Наименование</td>
                        <td class="quantity">Количество</td>
                        <td class="price">Цена</td>
                        <td class="">Сумма</td>
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
                                <h5><?=$item['name']?></h5>
                            </td>

                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up change-count" data-value="1" data-id="<?=$id?>"> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity"value="<?=$item['qty']?>" size="2" disabled>
                                    <a class="cart_quantity_down change-count" data-value="-1" data-id="<?=$id?>"> - </a>
                                </div>
                            </td>

                            <td class="cart-price">
                                <p>$<?=$item['price']?></p>
                            </td>
                            <td class="cart-total">
                                <p class="cart_total_price">$<?=$item['price']*$item['qty']?></p>
                            </td>
                            <td style="padding:10px"><i class="fa fa-times del-item" data-id="<?=$id?>"></i></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4"><h4 class="text-right">Итого</h4></td>
                        <td colspan="2" class="cart-total"><p class="cart_total_price"><?=$session['cart.qty']?> шт </p></td>
                    </tr>
                    <tr>
                        <td colspan="4"><h4 class="text-right">На сумму</h4></td>
                        <td colspan="2" class="cart-total"><p class="cart_total_price">$<?=$session['cart.sum']?></p></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Форма заказа   -->
            <hr>


            <div class="col-md-6 col-md-offset-3">
                <div class="contact-form">
                    <h2 class="title text-center">Форма заказа</h2>
                    <?php $form = ActiveForm::begin([
                        'id' => 'order-form',
                        'options' => ['class' => 'contact-form row']
                        ]);
                    ?>
                    <?= $form->field($order, 'name') ?>
                    <?= $form->field($order, 'email') ?>
                    <?= $form->field($order, 'phone') ?>
                    <?= $form->field($order, 'address') ?>
                    <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
                    <?= Html::resetButton('Сбросить', ['class' => 'btn btn-danger']) ?>
                    <?php ActiveForm::end() ?>
                </div>
            </div>

        <?php else: ?>
            <h4 class="text-center text-success">Корзина пуста</h4>
        <?php endif; ?>
    </section>
</div>


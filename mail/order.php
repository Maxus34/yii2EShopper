<h2>Ваш заказ принят</h2>
<table style="width:100%;border:1px solid #aaa; border-collapse:collapse;">
    <thead>
    <tr style="background: #f9f9f9;">
        <td style="padding:8px; border: 1px solid #ddd;"> Наименование </td>
        <td style="padding:8px; border: 1px solid #ddd;"> Количество </td>
        <td style="padding:8px; border: 1px solid #ddd;"> Цена </td>
        <td style="padding:8px; border: 1px solid #ddd;"> Сумма </td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($session['cart'] as $id => $item): ?>
        <tr>
            <td style="padding:8px; border: 1px solid #ddd;">
                <h4><?= $item['name'] ?></h4>
            </td>

            <td style="padding:8px; border: 1px solid #ddd;">
                <p><?= $item['qty'] ?></p>
            </td>

            <td style="padding:8px; border: 1px solid #ddd;">
                <p>
                    <?= $item['price']; ?>
                </p>
            </td>

            <td style="padding:8px; border: 1px solid #ddd;">
                <p class="cart_total_price">$<?= $item['price'] * $item['qty'] ?></p>
            </td>

        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="3" style="padding:8px; border: 1px solid #ddd;"><h4>Итого</h4></td>
        <td colspan="1" style="padding:8px; border: 1px solid #ddd;"><?= $session['cart.qty'] ?> шт</td>
    </tr>
    <tr>
        <td colspan="3" style="padding:8px; border: 1px solid #ddd;"><h4>На сумму</h4></td>
        <td colspan="1" style="padding:8px; border: 1px solid #ddd;">$<?= $session['cart.sum'] ?></td>
    </tr>
    </tbody>
</table>

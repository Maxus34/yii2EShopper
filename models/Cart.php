<?php
/**
 * Created by PhpStorm.
 * User: MXS34
 * Date: 27.11.2016
 * Time: 11:06
 */

namespace app\models;

use yii\base\Model;

class Cart extends Model
{
    public function addToCart($product, $qty = 1)
    {
        if (isset($_SESSION['cart'][$product->id])) {
            if ($qty < 0 && $_SESSION['cart'][$product->id]['qty'] < 1){
                return 0;
            }
            $_SESSION['cart'][$product->id]['qty'] += $qty;

        } else {
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $product->img,
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
    }

    public function deleteItemAndUpdateCart($id){
        if (!isset($_SESSION['cart'][$id])) return false;

        $_SESSION['cart.qty'] -=  $_SESSION['cart'][$id]['qty'];
        $_SESSION['cart.sum'] -= ($_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price']);
        unset($_SESSION['cart'][$id]);
    }
}
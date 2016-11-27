<?php
/**
 * Created by PhpStorm.
 * User: MXS34
 * Date: 27.11.2016
 * Time: 9:41
 */

namespace app\controllers;

use app\models\Product;
use app\models\Category;
use app\models\Cart;
use Yii;

class CartController extends AppController
{
    public function actionAdd($id)
    {
        $this->layout=false;

        $product = Product::findOne($id);
        if (empty($product)) {
            return false;
        }

        //Session
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);

        $session->close();
        return $this->render('cart-model', compact('session'));
    }

    public function actionClear(){
        $this->layout=false;
        //Session
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        return  $this->render('cart-model', compact('session'));
    }

}
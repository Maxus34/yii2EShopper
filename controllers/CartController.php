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
    private $session;

    public function beforeAction($action)
    {
        if (Yii::$app->request->isAjax){
            $this->layout = false;
        }
        $this->view->title = "ESHOPPER | Корзина";
        $this->session = Yii::$app->session;
        $this->session->open();
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    public function afterAction($action, $result)
    {
        $this->session->close();
        return parent::afterAction($action, $result); // TODO: Change the autogenerated stub
    }

    public function actionIndex(){
        return $this->render('cart-model', [
            'session' => $this->session,
        ]);
    }

    public function actionAdd($id, $qty = 1)
    {
        $product = Product::findOne($id);
        if (empty($product)) {
            return false;
        }
        $qty = (int)$qty ? (int)$qty : 1;
        $cart = new Cart();
        $cart->addToCart($product, $qty);

        return $this->render('cart-model', [
            'session' => $this->session,
        ]);
    }

    public function actionClear(){

        $this->session->remove('cart');
        $this->session->remove('cart.qty');
        $this->session->remove('cart.sum');
        return $this->render('cart-model', [
            'session' => $this->session,
        ]);
    }

    public function actionDelItem($id){
        $cart = new Cart();
        $cart->deleteItemAndUpdateCart($id);

        return $this->render('cart-model', [
            'session' => $this->session,
        ]);
    }

    public function actionView(){
        return $this->render('cart-model', ['session' => $this->session]);
    }
}
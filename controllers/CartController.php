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
use app\models\Order;
use app\models\OrderItems;
use app\models\Cart;
use Yii;

class CartController extends AppController
{
    protected $session;
    protected $cart;

    public function beforeAction($action)
    {
        if (Yii::$app->request->isAjax){
            $this->layout = false;
        }

        $this->cart = new Cart();
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
        return $this->render('cart-modal', [
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

        return $this->render('cart-modal', [
            'session' => $this->session,
        ]);
    }

    public function actionClear(){

        $this->cart->clearCart();

        return $this->render('cart-modal', [
            'session' => $this->session,
        ]);
    }

    public function actionDelItem($id){

        $this->cart->deleteItemAndUpdateCart($id);

        return $this->render('cart-modal', [
            'session' => $this->session,
        ]);
    }

    public function actionView(){
        $this->view->title = "ESHOPPER | Оформление заказа";

        $order = new Order();
        if ($order->load(Yii::$app->request->post())){
           $order->qty = $this->session['cart.qty'];
           $order->sum = $this->session['cart.sum'];
            if($order->save()){

                Yii::$app->mailer->compose('order', ['session'=>$this->session])
                    ->setFrom(['maksproshkin@gmail.com' => "ESHOPPER"])
                    ->setTo("maks_proshkin@mail.ru")
                    ->setSubject('Заказ')
                    ->send();

                $this->saveOrderItems($this->session['cart'], $order->id);
                $this->cart->clearCart();

                Yii::$app->session->setFlash('success', 'Ваш заказ принят');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Произошла ошибка');
            }
        }

        return $this->render('cart-view', [
            'session' => $this->session,
            'order' => $order,
        ]);
    }

    protected function saveOrderItems($items, $order_id){
        foreach ($items as $id => $item){
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items->save();
        }
    }
}
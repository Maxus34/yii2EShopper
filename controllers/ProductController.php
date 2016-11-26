<?php
/**
 * Created by PhpStorm.
 * User: MXS34
 * Date: 25.11.2016
 * Time: 17:18
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;

class ProductController extends AppController
{
    public function actionView($id) {
        $id = Yii::$app->request->get('id');
        $product = Product::find()->where(['=', 'id', $id])->with('category')->limit(1)->one();
        if (empty($product))
            //$this->view->title="Error 404";
            throw new \yii\web\HttpException(404, 'Ошибка, товар не найден!');

        $products_hits = Product::find()->where(['hit' => '1'])->limit(9)->all();

        $this->setMeta('E_SHOPPER | ' . mb_convert_case($product->name, 0), $product->keywords, $product->description);
        return $this->render('view', compact('product', 'products_hits'));
    }
}
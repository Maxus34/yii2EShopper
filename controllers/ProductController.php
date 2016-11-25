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
        $product = Product::find()->where(['=', 'id', $id])->with('category')->limit(1)->all()[0];

        $this->setMeta('E_SHOPPER | ' . mb_convert_case($product->name, 0), $product->keywords, $product->description);
        return $this->render('view', compact('product'));
    }
}
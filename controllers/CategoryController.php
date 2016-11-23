<?php
/**
 * Created by PhpStorm.
 * User: MXS34
 * Date: 22.11.2016
 * Time: 16:10
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;

class CategoryController extends AppController
{
    public function actionIndex() {
        $this->view->title="Home";
        $products_hit = Product::find()->where(['=', 'hit', '1'])->limit(6)->all();

        return $this->render('index', compact('products_hit'));
    }

}
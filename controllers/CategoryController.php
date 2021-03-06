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
use yii\data\Pagination;
use yii\helpers\Html;
use yii\web\HttpException;
use Yii;

class CategoryController extends AppController
{
    public function actionIndex() {
        $this->setMeta('E_SHOPPER');
        $products_hit = Product::find()->where(['=', 'hit', '1'])->limit(6)->all();
        return $this->render('index', compact('products_hit'));
    }

    public function actionView($id) {
        $category = Category::findOne(['=', 'id', $id]);
        if (empty($category)) {
            throw new HttpException(404, "Такой категории не существует");
        }

        $query = Product::find()->where(['category_id' => $id]);

        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize'   => 3,
            'forcePageParam' => false,
            'pageSizeParam'  => false,
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->setMeta('E_SHOPPER | ' . mb_convert_case($category->name, 0), $category->keywords, $category->description);

        return $this->render('view', compact('products', 'category', 'pages'));
    }

    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('E_SHOPPER | Search ' . mb_convert_case($q, 0));
        if (empty($q)){
            return $this->render('search', compact('q'));
        }
        $query = Product :: find() -> where(['like', 'name', $q]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);

        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'q'));
    }
}
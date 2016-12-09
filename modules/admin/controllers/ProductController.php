<?php

namespace app\modules\admin\controllers;

//use GuzzleHttp\Psr7\UploadedFile;
use Yii;
use app\modules\admin\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\{ Controller, NotFoundHttpException, UploadedFile};
use yii\filters\VerbFilter;


class ProductController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->with('category'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Товар <b>\"{$model->name}\"</b> успешно добавлен");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model -> image = UploadedFile::getInstance($model, 'image');
            $model -> gallery = UploadedFile::getInstances($model, 'gallery');
            if ($model -> image){
                $model -> uploadImage();
                unset($model->image);
            }
            if ($model -> gallery){
                $model -> uploadGallery();
            }
            Yii::$app->session->setFlash('success', "Товар <b>\"{$model->name}\"</b> успешно обновлен");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

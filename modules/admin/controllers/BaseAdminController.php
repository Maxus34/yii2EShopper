<?php
/**
 * Created by PhpStorm.
 * User: MXS34
 * Date: 30.11.2016
 * Time: 21:37
 */

namespace app\modules\admin\controllers;
use yii\base\Controller;
use yii\filters\AccessControl;

class BaseAdminController extends Controller
{
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // ? - не авторизованный пользователь
                    ],
                ],
            ],
        ];
    }
}
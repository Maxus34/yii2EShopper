<?php
/**
 * Created by PhpStorm.
 * User: MXS34
 * Date: 27.11.2016
 * Time: 11:06
 */

namespace app\models;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($product, $qty = 1){
        echo 'Worked!';
    }
}
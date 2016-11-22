<?php
/**
 * Created by PhpStorm.
 * User: MXS34
 * Date: 22.11.2016
 * Time: 13:59
 */

namespace app\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
       return 'category';
    }

    public function getProducts () {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

}
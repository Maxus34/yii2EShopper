<?php
/**
 * Created by PhpStorm.
 * User: MXS34
 * Date: 22.11.2016
 * Time: 13:59
 */

namespace app\models;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function getCategory () {
        return $this->hasOne(Category::className(), ['id'  =>  'category_id']);
    }

}
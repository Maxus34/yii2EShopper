<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product extends \yii\db\ActiveRecord
{
    public $image;
    public $gallery;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName()
    {
        return 'product';
    }

    public function getCategory () {
        return $this->hasOne(Category::className(), ['id'=>'category_id']);
    }


    public function rules()
     {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
           // [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'name' => 'Наименование',
            'content' => 'Описание',
            'price' => 'Цена',
            'keywords' => 'Ключевые слова',
            'description' => 'Мета - описание',
            'image' => 'Фото',
            'hit' => 'Хит',
            'new' => 'NEW',
            'sale' => 'SALE',
        ];
    }

    public function upload() {
        if ($this->validate()){
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            return true;
        } else {
            return false;
        }
    }
}

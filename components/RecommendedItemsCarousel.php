<?php
/**
 * Created by PhpStorm.
 * User: MXS34
 * Date: 26.11.2016
 * Time: 15:48
 */

namespace app\components;
use yii\base\Widget;
use app\models\Product;
use Yii;

class RecommendedItemsCarousel extends Widget
{
    public $template;
    public $products;
    public $html;

    public function init(){
        parent :: init();
        $this->template = 'carousel';
    }

    public function run() {
       if (!empty($this->products)) {
           $this->html = $this->getCarousel($this->products);
           return $this->html;

       } else {
           return "Products is empty!";
       }
    }

    public function getCarousel ($products) {
        ob_start(); // Буферизация
        include __DIR__ . '/recommended_carousel/' . $this->template . '.php';
        return ob_get_clean();
    }
}
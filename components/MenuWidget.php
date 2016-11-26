<?php

namespace app\components;

use yii\base\Widget;
use app\models\Category;
use Yii;

class MenuWidget extends Widget
{
    public  $tpl;
    public  $data;
    public  $tree;
    public  $menuHtml;

    public function init() {
        parent::init();
        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run() {
        // get cache
        $menu = Yii::$app->cache->get('menu');
        if ($menu) return $menu;

        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);

        //add to cache
        Yii::$app->cache->set('menu', $this->menuHtml, 1000);
        return $this->menuHtml;
    }

    protected function getTree () {
        // Разбивает массив категорий на дерево относительно параметра parent_id
        $tree = [];
        foreach ($this->data as $id => &$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml ($tree) {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate($category) {
        ob_start(); // Буферизация
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

}
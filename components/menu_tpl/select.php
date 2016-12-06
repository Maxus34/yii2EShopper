<option
    value="<?=$category['id']?>"
    <?php
        if(!empty($this->model->parent_id)){
            //Для подстановки в выборе категории /admin/category/add|update
            if($category['id'] == $this->model->parent_id) echo 'selected';
            if($category['id'] == $this->model->id) echo 'disabled';
        }
        else {
            //Для подстановки категории к продукту /admin/product/add|update
            if($category['id'] == $this->model->category_id) echo 'selected';
        }
    ?> >
    <?=$tab . $category['name']?>
</option>

<?php if(isset($category['childs'])): ?>
    <?= $this->getMenuHtml($category['childs'], $tab . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'); ?>
<?php endif; ?>


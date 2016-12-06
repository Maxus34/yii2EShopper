<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\ElFinder;
use mihaildev\ckeditor\CKEditor;

\mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group field-product-category_id">
        <label class="control-label" for="product-category_id">Kатегория</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]">
            <option value="0">Самостоятельная</option>
            <?= \app\components\MenuWidget::widget(['tpl' => 'select', 'model' => $model]); ?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
       /* echo $form->field($model, 'content')->widget(\mihaildev\ckeditor\CKEditor::className(),[
            'editorOptions' => [
                'preset' => 'full',
                'inline' => false,
            ]
        ])*/
        echo $form->field($model, 'content')->widget(CKEditor::className(), [
             'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),
        ]);
    ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hit')->checkbox([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'new')->checkbox([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'sale')->checkbox([ '0', '1', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

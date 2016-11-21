<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?=Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

     <div class="wrap" >
         <ul class="nav nav-pills" style="margin:30px 20px 20px;">
             <li role="presentation"><?= Html::a('Главная',['site/index'])?></li>
             <li role="presentation"><?= Html::a('Статьи', ['post/index'])?></li>
             <li role="presentation"><?= Html::a('Статья', ['post/show'])?></li>
         </ul>
         <div class="container">
             <?= $content ?>
         </div>
     </div>

<?php $this->endBody() ?>
</body>

</html>

<?php $this->endPage() ?>
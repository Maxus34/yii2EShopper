<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
    $this->title = $name;
?>
<div class="site-error container">
    <div class="container text-center">
        <div class="logo-404">
            <a href="<?= \yii\helpers\Url::home(); ?>"><?=Html::img('@web/images/home/logo.png', ['alt' => '']); ?></a>
        </div>
        <div class="content-404">
            <h1><b>OPPS!&nbsp&nbsp</b><?= nl2br(Html::encode($message)) ?></h1>
            <h2><a onclick="history.go(-1)">Go back</a></h2>
            <?=Html::img('@web/images/404/404.png', ['alt' => '', 'class' => 'img-responsive']); ?>
        </div>
    </div>
</div>

<?php
    use yii\helpers\Html;
?>

<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="item active">
            <?php $i = 0; foreach ($products as $product): ?>

            <div class="col-sm-4"><!--Product -->
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <?= Html::img("@web/images/products/$product->img",['alt' => ''])?>
                            <h2>$<?= $product->price ?></h2>
                            <p>
                                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>"> <?= $product->name ?> </a>
                            </p>
                            <button type="button" class="btn btn-default add-to-cart" data-id="<?=$product->id?>"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div> <!--Product -->

            <?php $i++; if ($i === count($products)): ?>
        </div>
        <?php else: if($i % 3 === 0):?>
            </div>
            <div class="item">
        <?php endif; ?>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
        <i class="fa fa-angle-left"></i>
    </a>
    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
        <i class="fa fa-angle-right"></i>
    </a>
</div>
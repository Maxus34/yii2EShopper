<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-3">
                <div class="left-sidebar">

                    <div class="category">
                        <h2>Category</h2>
                        <ul class="catalog category-products" id = 'catalog'>
                            <?= \app\components\MenuWidget:: widget(['tpl' => 'menu'])?>
                        </ul>
                    </div> <!-- Category Widget -->


                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">

                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">

                        <div class="view-product">
                            <?= Html::img("@web/images/products/$product->img", ['class' => 'product-img']); ?>

                            <?php if ($product->new) : ?>
                                <?= Html::img("@web/images/home/new.png", ['class' => 'new']); ?>
                            <?php endif; ?>
                            <?php if ($product->sale) : ?>
                                <?= Html::img("@web/images/home/sale.png", ['class' => 'new']); ?>
                            <?php endif; ?>

                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a href=""><img src="/images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="/images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="/images/product-details/similar3.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="/images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="/images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="/images/product-details/similar3.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="/images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="/images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="/images/product-details/similar3.jpg" alt=""></a>
                                </div>

                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <h2><?=$product->name?></h2>
                            <p>Web ID: <?=$product->id?></p>
                            <img src="/images/product-details/rating.png" alt="" />
                            <span>
									<span>US $<?=$product->price?></span>
									<label>Quantity:</label>
									<input type="text" value="1" id="qty"/>
									<a href="<?=Url::to(['cart/add', 'id' => $product->id]);?>" class="btn btn-default cart add-to-cart" data-id="<?=$product->id ?>">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</a>
                            </span>
                            <p><b>Availability:</b> In Stock</p>
                            <p>
                                <b>Brand:</b>
                                <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->id]);?>">
                                    <?=$product->category->name?>
                                </a>
                            </p>
                            <a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                    <div class="row">
                        <div class="span6 clearfix">
                            <?=$product->content ?>
                        </div>
                    </div>

                </div><!--/product-details-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>
                    <!-- Widget for outputing carousel with recommended pruducts -->
                    <?= \app\components\RecommendedItemsCarousel:: widget(['products' => $products_hits ])?>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>


<?php require_once 'partials/FrontEnd/__header.php'?>
<main role="main">
    <div class="container" style="margin-bottom: 40px;">
        <br>
        <h3 class="text-center"><?php echo $products->name;?> </h3>
        <hr style="margin-bottom: 40px;">

        <div class="card">
            <div class="row">
                <aside class="col-sm-5 border-right">
                    <article class="gallery-wrap">
                        <div>
                            <img src="<?php echo $products->photo;?>" class="card-img-top" alt="">
                        </div> <!-- slider-product.// -->
                    </article> <!-- gallery-wrap .end// -->
                </aside>

                <aside class="col-sm-7">
                    <article class="card-body p-5">
                        <h3 class="title mb-3"><?php echo $products->name;?></h3>

                        <p class="price-detail-wrap">
                            <span class="price h3 text-warning">
                                <span class="currency">BDT </span>
                                <span class="num">
                                    <?php echo  $products->price; ?>
                                </span>
                            </span>
                        </p> <!-- price-detail-wrap .// -->

                        <dl class="item-property">
                            <dt>Description</dt>
                            <dd><p><?php echo  $products->description; ?></p></dd>
                        </dl>
                        <hr>


                    </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->

    </div>
    <!--container.//-->
</main>
<?php require_once 'partials/FrontEnd/__footer.php'?>
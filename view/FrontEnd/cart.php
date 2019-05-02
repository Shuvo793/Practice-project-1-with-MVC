<?php require_once 'partials/FrontEnd/__header.php'?>
<main role="main">
    <div class="container">
        <br>
        <p class="text-center">Cart</p>
        <hr>
        <div class="row">
            <?php if(empty($cart)) : ?>
                <div class="alert alert-warning">
                    Please add some products first.
                </div>
            <?php else : ?>
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <td>Sl.</td>
                        <td>Product Title</td>
                        <td>Quantity</td>
                        <td>Unit Price</td>
                        <td>Total Price</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($cart as $key => $product):?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['quantity'];?></td>
                            <td>BDT <?php echo number_format($product['price'],2); ?></td>
                            <td>BDT <?php echo number_format($product['total_price'],2);?></td>
                            <td>
                                <form action="cart.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $key;?>" >
                                    <button type="submit" class="btn btn-sm btn-danger" name="delete">Delete</button>
                                    <button type="submit" name="decrease" class="btn btn-sm btn-danger">
                                        [-]
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total Price</td>
                        <td>BDT <?php echo number_format($total_price,2);?></td>
                        <td>
                            <form action="cheakout.php" method="post">
                                <button class="btn btn-success mr-1 float-left" name="cheakout">Checkout</button>
                            </form>
                            <form action="cart.php" method="post">
                                <button type="submit" class="btn btn-danger" name="clear">[x]</button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            <?php endif;?>
        </div> <!-- row.// -->

    </div>
    <!--container.//-->
</main>
<?php require_once 'partials/FrontEnd/__footer.php'?>

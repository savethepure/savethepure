<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>

<title>Save The Pure | Cart</title>
<div class="wrapper-container u-py3">
    <hr>
        <h2 class="center mt1">Shoping Cart</h2>
    <hr>
    <div class="col-12 sm-col-12 md-col-10 lg-col-10 mx-auto">    
    <form method="post" action="<?php echo base_url() ?>cart/update">      
        <table class="table table-cart">
            <thead>
            <tr>
                <th class="xs-hide sm-hide">&nbsp;</th>
                <th>Product Name</th>
                <th>Size</th>
                <th>Unit Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($cart_list)) { ?>
                <? foreach($cart_list as $product) { ?>

                <tr>
                    <td class="col-1 xs-hide sm-hide">
                        <div>
                            <img src="<?php echo base_url() ?>assets/img/products/<? echo $product['picture'] ?>" style="max-width:100%;" alt="">
                        </div>
                    </td>
                    <td class="col-5">
                        <h4><a href="<?php echo base_url().'product/'.str_replace(' ','-', $product['name']) ?>"><b><? echo $product['name'] ?></b></a></h4>
                        <span><a href="<?php echo base_url().'cart/remove/'.$product['rowid'] ?>">Remove Item</a></span>
                    </td>
                    <td class="col-1">
                        <? echo $product['size'] ?>
                    </td>
                    <td class="col-2">
                        IDR <? echo $product['price'] ?>
                    </td>
                    <td class="col-1">
                         <input type="hidden" name="rowid[]" value="<? echo $product['rowid'] ?>"> 
                        <input style="width:50px;text-align: center;" type="number" name="qty[]" value="<? echo $product['qty'] ?>">
                    </td>
                    <td class="col-2">
                        IDR <? echo $product['qty'] * $product['price'] ?>
                    </td>
                </tr>

            <?php } ?>
                <tr>
                    <td class="col-1 xs-hide sm-hide">&nbsp;</td>
                    <td colspan="4"><b>Grand Total</b></td>
                    <td class="number"><b>IDR <?= $this->cart->total(); ?></b></td>
                </tr> 
            <?php } else { ?>
                
                <tr class="center">
                    <td colspan="6">
                        <h3>Cart is empty</h3>
                        <a href="<?php echo base_url() ?>" class="btn btn-default mt3">Continue Shopping</a>
                    </td>
                </tr>

            <?php } ?>
            </tbody>
        </table>
        <?php if (!empty($cart_list)) { ?>
        <div class="function-cart clearfix">
            <div class="col col-6 px3">
                <button class="btn btn-default btn-block">Update Cart</button>
            </div>
            <div class="col col-6 px3">
                <a href="<?php echo base_url() ?>cart/clear" class="btn btn-default btn-block">Clear Cart</a>
            </div>
        </div>
        <?php } ?>
    </div>
    </form>
    <form method="post" action="<?php echo base_url() ?>checkout">
        <input type="hidden" name="refs" value="checkout">
        <div class="col-4 mx-auto center mt6">
        	<?php if (!empty($cart_list)) { ?>
        		<button class="btn btn-default bg-black btn-block" >Proced to Checkout</button>
        	<?php }else{ ?>
				<button class="btn btn-default bg-black btn-block" disabled="disabled">Proced to Checkout</button>
        	<?php } ?>
        </div>

    </form>
</div>

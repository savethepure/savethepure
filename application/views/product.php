<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/header.php'); ?>

<title>Save The Pure | Home</title>

<?php 
    foreach ($products as $rows) {
        $product_id = $rows['id'];
        $product_name = $rows['product_name'];
        $picture = $rows['picture'];
        $desc = $rows['desc'];
        $price = $rows['price'];
    }
?>

<div class="wrapper-container py2"> 
    <div class="box-product px1">
        <div class="title-product center py1 col-12">
            <h2><?php echo $product_name; ?></h2>
        </div>
        <div class="body-product col-12 overflow-hidden">
            <div class="col col-12 md-col-6 sm-col-12 lg-col-6 px1 py1 b-product-picture center">
                <img src="<?php echo base_url() ?>assets/img/products/<?php echo $picture; ?>" alt="">
            </div>
            <div class="col col-12 md-col-6 sm-col-12 lg-col-6 b-product-desc">
                <div class="price col-12 py1 px1">
                    <h3>Price : Rp. <?php echo $price; ?></h3> 
                </div>
                <hr>
                <div class="size col-12 py1 px1">
                    <h3>Size : 
                        <?php foreach ($sizes as $rows) { ?>
                            <input type="radio" name="size" onchange="choose_size()" value="<?php echo $rows['size']; ?>"><?php echo $rows['size']; ?>
                        <?php } ?>
                    </h3> 
                </div>
                <hr>
                <div class="quantity col-12 py1 px1">
                    <h3>Quantity: </h3>
                </div>
                <hr>
                <div class="description py1 px1">
                    <p><?php echo $desc; ?></p>
                </div>
                <hr>
                <div class="btn-cart center py1 px1">
                    <a href="<?php echo base_url().'cart/add/'.$product_id ?>">
                        <div class="button large black">Add to Cart</div>
                    </a>
                </div>
            </div>
        </div>
        
    </div>
</div>

<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.js"></script>
<script>
    
    function choose_size() {
        size = $('[name="size"]').val();
        console.log(size);
    }
</script>
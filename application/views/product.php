<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<div id="header-wrapper-global">
    <?php include('static/header.php'); ?>
</div>

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
<input type="hidden" id="id_product" value="<?php echo $product_id; ?>">
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
                            <input type="radio" name="size" onchange="choose_size()" value="<?php echo $rows['size']; ?>" checked><?php echo $rows['size']; ?>
                        <?php } ?>
                    </h3> 
                </div>
                <hr>
                <div class="quantity col-12 py1 px1 relative">
                    <h3 class="inline-block mr3 mt0 mb0">Quantity:</h3> 
                    <div class="clearfix col-8 inline-block center mt3 qty-wrapper">
                        <div class="col col-2 px1">
                            <div class="quantity-control quantity-down">-</div>
                        </div>
                        <input class="col col-3 input-lg" type="number" id="quantity"
                         min="0" name="quantity" value="1" min="0">
                        <div class="col col-2 px1">
                            <div class="quantity-control quantity-up">+</div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="description py1 px1">
                    <p><?php echo $desc; ?></p>
                </div>
                <hr>
                <div class="btn-cart center py1 px1">
                    <div class="button large black ld-over-inverse" onclick="add_cart()" id="add-cart">Add to Cart
                        <div class="ld ld-ball ld-flip"></div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<div id="snackbar"><?php echo $product_name; ?> successfully added. <a href="<?php echo base_url() ?>cart">View cart</a></div>
<div id="snackbar_size">Please Choose Size...</a></div>
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.js"></script>
<script>
    
    function choose_size() {
        size = $('[name="size"]').val();
        console.log(size);
    }

    var qty = $("#quantity");
    var cur_qty = $('#quantity').val();

    $( ".quantity-down" ).click(function() {
        cur_qty--;
        if(cur_qty<1){
            cur_qty = 1;
        }
        qty.val(cur_qty);
    });

    $( ".quantity-up" ).click(function() {
        cur_qty++;
        if(cur_qty>30){
            cur_qty = 30;
        }
        qty.val(cur_qty);
    });

   function add_cart() {
        var id = $("#id_product").val();
        var cur_qty = $("#quantity").val();
        var size = $('input[name="size"]:checked').val();
        $("#add-cart").addClass('running');
        
        if (id != '' && cur_qty != '' && size != '')
        {

            $.ajax({
                url: '<?php echo base_url()?>cart/add',
                type: 'POST',
                data: {
                    id: id, qty: cur_qty , size: size
                },
                success: function(data, textStatus, xhr) {
                    if (data === 'ok') {
                        $("#add-cart").removeClass('running');
                        var x = document.getElementById("snackbar")
                        x.className = "show";
                        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                    }    
                },
                error: function() {
                    console.log('eror')
                }
            });
            $('#header-wrapper-global').load(document.URL +  ' #header-wrapper-global');
        }else{
            $("#id_product").removeClass('running');
            var y = document.getElementById("snackbar_size")
            y.className = "show";
            setTimeout(function(){ y.className = y.className.replace("show", ""); }, 3000);
        }
    };

</script>
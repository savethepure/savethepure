<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<div id="header-wrapper-global">
    <?php include('static/header.php'); ?>
</div>
<style>

    .card {
    display: block;
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
    transition: box-shadow .25s;
    }
    .card:hover {
    box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    }
    .img-card {
    width: 100%;
    border-top-left-radius:2px;
    border-top-right-radius:2px;
    display:block;
        overflow: hidden;
    }
    .img-card img{
    width: 100%;
    height: 400px;
    object-fit:cover;
    transition: all .25s ease;
    }
    .card-content {
    padding:15px;
    text-align:left;
    }
    .card-title {
    margin-top:0px;
    font-weight: 700;
    font-size: 1.65em;
    }
    .card-title a {
    color: #000;
    text-decoration: none !important;
    }
    .card-read-more {
    border-top: 1px solid #D4D4D4;
    }
    .card-read-more a {
    text-decoration: none !important;
    padding:10px;
    font-weight:600;
    text-transform: uppercase
    }

</style>

<title>Save The Pure | Home</title>

<?php 
    foreach ($products as $rows) {
        $product_id = $rows['id'];
        $product_name = $rows['product_name'];
        $picture = $rows['picture'];
        $desc = $rows['desc'];
        $price = $rows['price'];
        $url = $rows['url'];
        $type = $rows['type'];
        $title = $rows['title'];
        $cont_desc = $rows['deskripsi'];
    }
?>
<!-- profile section  -->
<div class="wrapper-container py2 profile-div animated fadeIn">
    <div class="card">
        <div class="img-card" href="">
            <?php if($type == 'video'){ ?>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="<?php echo $url; ?>"></iframe>
                </div>
            <?php }else if($type == 'photo'){ ?>
                <img src="<?php echo base_url() ?>assets/img/events/<?php echo $url; ?>" alt="">
            <?php } ?>
        </div>
        <br />
        <div class="card-content">
            <h4 class="card-title">
                <a href="">
                    <?php echo $title; ?>
                </a>
            </h4>
            <div class="">
                <?php echo $cont_desc; ?>
            </div>
            <hr>
            <div class="col-6 mx-auto mt2">
                <div class=" btn btn-default btn-block bg-black" onclick="buy()">Buy Product</div>
            </div>
        </div>
    </div>
</div>



<!--product section  -->
<input type="hidden" id="id_product" value="<?php echo $product_id; ?>">
<div class="wrapper-container py2 product-div hidden animated fadeInLeft"> 
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
                    <h5>Price : IDR <?php echo $price; ?></h5> 
                </div>
                <hr class="mt0 mb0">
                <div class="size col-12 py1 px1">
                    <h5 class="inline-block mr2">Size : </h5> 
                    <div class="form-group">
                    	<select name="size" class="form-control" id="size">
                    		<?php foreach ($sizes as $rows) { ?>
                    			<option value="<?php echo $rows['size']; ?>"><?php echo $rows['size']; ?></option>
                    		<?php } ?>
                    	</select>
                    </div>
                        <!-- <?php foreach ($sizes as $rows) { ?>
                            <div class="form-group inline-block mr2">
                                <input type="radio" name="size" onchange="choose_size()" value="<?php echo $rows['size']; ?>" checked><?php echo $rows['size']; ?>
                            </div>
                        <?php } ?> -->
                    
                </div>
                <hr class="mt0">
                <div class="quantity col-12 py1 px1 relative">
                    <h5 class="inline-block mr3 mt0 mb0">Quantity:</h5> 
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
                <hr class="">
                <div class="description py1 px1">
                    <p><?php echo $desc; ?></p>
                </div>
                <hr class="mt0 mb0">
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
    function buy()
    {
        $('.product-div').removeClass('hidden');
        $('.profile-div').addClass('hidden');
    }
</script>
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

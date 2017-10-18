<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>

<title>Save The Pure | List Product</title>

<div class="wrapper-container u-py3"> 
    <div class="product-list py20">
    	<?php if (!empty($products)) { ?>

	        <?php foreach ($products as $rows) { ?>
	        
	            <div class="row center">
	                <div class="product mx-auto">
	                    <a href="<?php echo base_url().'product/'.str_replace(' ', '-', strtolower($rows['product_name'])); ?>">
	                        <img src="<?php echo base_url() ?>assets/img/products/<?php echo $rows['picture']; ?>" alt="">
	                    </a>
	                </div>
	            </div>

	        <?php } ?>
	    <?php } else { ?>
	    	

		   		<h1 style="text-align: center;min-height: 100vh;">Product is Empty</h1>

		    
	    <?php } ?>
    </div>
</div>

<?php include('static/footer.php'); ?>

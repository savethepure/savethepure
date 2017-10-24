<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>

<title>Save The Pure | Home</title>

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
	    	<?php foreach ($events as $rows) { ?>

		    <!-- <div class="row center">
		        <div class="product mb4 pb0 mx-auto">
		            <a href="<?php echo base_url().'event/detail/'.str_replace(' ', '-', strtolower($rows['title_event'])); ?>">
		                <img src="<?php echo base_url() ?>assets/img/events/<?php echo $rows['picture']; ?>" alt="">
		            </a>
		        </div>
		    </div> -->

		    <?php } ?>

	    <?php } ?>
	    <div class="row center banner-trailer">
			<div class="product mx-auto">
				<a href="<?php echo base_url().'last_event'; ?>">
					<img src="<?php echo base_url() ?>assets/img/events/last_event1.png" alt="">
				</a>
			</div>
		</div>
		<div class="row center banner-trailer">
			<div class="product mx-auto">
				<a href="<?php echo base_url().'trailer'; ?>">
					<img src="<?php echo base_url() ?>assets/img/events/trailer_banner.png" alt="">
				</a>
			</div>
		</div>
    </div>
</div>

<?php include('static/footer.php'); ?>

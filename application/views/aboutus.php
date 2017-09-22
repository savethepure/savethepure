<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>

<title>Save The Pure | About Us</title>
<div class="wrapper-container u-py3" style="min-height: 600px;">

    <div class="foto">
    	<img src="<?php echo base_url() ?>assets/img/aboutus.jpg" width="100%" alt="">
    </div>

    <h2 class="center">About Us</h2>
	
	<div class="col-6 mx-auto mt2 py2 px2">
		<p class="justify">
	        <?php echo $about; ?>
	    </p>
	</div>
</div>

<?php include('static/footer.php'); ?>

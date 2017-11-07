<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>


<title>Save The Pure | News & Event</title>

<style>

    .product:hover {
        box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    }

    .product {
        padding-bottom: 0 !important;
    }


</style>

<div class="wrapper-container u-py3">
    <hr>
    <h2 class="center mt1">News & Event</h2>
    <hr>

    <?php foreach ($events as $rows) { ?>

    <div class="row center">
         <div class="row center banner-trailer mb2">
            <div class="product mx-auto">
                <a href="<?php echo base_url().'project_satu'; ?>">
                    <img src="<?php echo base_url() ?>assets/img/events/project 001.jpg" alt="">
                </a>
            </div>
        </div>
        <div class="row center banner-trailer mb2">
            <div class="product mx-auto">
                <a href="<?php echo base_url().'last_event'; ?>">
                    <img src="<?php echo base_url() ?>assets/img/events/last_event1.png" alt="">
                </a>
            </div>
        </div>
        <div class="row center banner-trailer mb2">
            <div class="product mx-auto">
                <a href="<?php echo base_url().'trailer'; ?>">
                    <img src="<?php echo base_url() ?>assets/img/events/trailer_banner.png" alt="">
                </a>
            </div>
        </div>
      
    </div>

    <?php } ?>

</div>

<?php include('static/footer.php'); ?>

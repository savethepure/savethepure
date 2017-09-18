<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>


<title>Save The Pure | Event</title>

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
    <h2 class="center mt1">Our Event</h2>
    <hr>

    <?php foreach ($events as $rows) { ?>

    <div class="row center">
        <div class="product mb4 pb0 mx-auto">
            <a href="<?php echo base_url().'event/detail/'.str_replace(' ', '-', strtolower($rows['title_event'])); ?>">
                <img src="<?php echo base_url() ?>assets/img/events/<?php echo $rows['picture']; ?>" alt="">
            </a>
        </div>
    </div>

    <?php } ?>

</div>
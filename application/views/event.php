<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/header.php'); ?>


<title>Save The Pure | Event</title>

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
    height:400px;
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

<div class="wrapper-container u-py3">
    <hr>
    <h1 class="center mt1">Our Event</h1>
    <hr>

    <?php foreach ($events as $rows) { ?>

    <div class="card">
        <a class="img-card" href="">
            <img src="<?php echo base_url() ?>assets/img/events/<?php echo $rows['picture']; ?>" />
        </a>
        <br />
        <div class="card-content">
            <h4 class="card-title">
                <a href="">
                    <?php echo $rows['title_event']; ?>
                </a>
            </h4>
            <div class="">
                <?php echo $rows['description']; ?>
            </div>
        </div>
        <!-- <div class="card-read-more">
            <a class="btn btn-link btn-block" href="">
                Read More
            </a>
        </div> -->
    </div>

    <?php } ?>

</div>
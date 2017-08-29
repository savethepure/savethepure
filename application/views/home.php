<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/header.php'); ?>

<title>Save The Pure | Home</title>

<div class="wrapper-container u-py3"> 
    <div class="product-list py20">
        <?php foreach ($products as $rows) { ?>
        
            <div class="row center">
                <div class="product mx-auto">
                    <a href="<?php echo base_url().str_replace(' ', '-', strtolower($rows['product_name'])); ?>">
                        <img src="<?php echo base_url() ?>assets/img/products/<?php echo $rows['picture']; ?>" alt="">
                    </a>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

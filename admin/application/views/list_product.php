<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>


<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kelola Product</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a href="<?php echo base_url() ?>products/add"><i class="fa fa-plus"></i> Tambah Product</a></li>
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="row">

              <?php foreach ($products as $rows) { ?>
              <!--start  -->

              <div class="col-md-55">
                <div class="thumbnail">
                  <div class="image view view-first">
                    <img style="width: 100%; display: block;" src="<?php echo UPLOAD_PRODUCT_URL ?>assets/img/products/<?php echo $rows['picture']; ?>" alt="image" />
                    <div class="mask">
                      <p><?php echo $rows['timestamp']; ?></p>
                      <div class="tools tools-bottom">
                        <!-- <a href="<?php echo base_url().'products/edit/'.$rows['id']; ?>"><i class="fa fa-pencil"></i></a> -->
                        <a href="<?php echo base_url().'products/delete/'.$rows['id']; ?>"><i class="fa fa-times"></i></a>
                        <a href="<?php echo base_url().'products/add_photo/'.$rows['id']; ?>"><i class="fa fa-camera"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="caption">
                    <p><?php echo $rows['product_name']; ?></p>
                    <p>Harga : <?php echo $rows['price']; ?></p>
                  </div>
                </div>
              </div>

              <!-- end  -->
              <?php } ?>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->


<?php include('static/footer.php'); ?>

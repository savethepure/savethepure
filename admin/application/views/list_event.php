<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>


<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kelola Event</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a href="<?php echo base_url() ?>events/add"><i class="fa fa-plus"></i> Tambah Event</a></li>
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="row">

              <?php foreach ($events as $rows) { ?>
              <!--start  -->

              <div class="col-md-55">
                <div class="thumbnail">
                  <div class="image view view-first">
                    <img style="width: 100%; display: block;" src="<?php echo UPLOAD_PRODUCT_URL ?>assets/img/events/<?php echo $rows['picture']; ?>" alt="image" />
                    <div class="mask">
                      <p><?php echo $rows['date']; ?></p>
                      <div class="tools tools-bottom">
                        <!-- <a href="<?php echo base_url().'events/edit/'.$rows['id']; ?>"><i class="fa fa-pencil"></i></a> -->
                        <a href="<?php echo base_url().'events/delete/'.$rows['id']; ?>"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="caption">
                    <p><?php echo $rows['title_event']; ?></p>
                    <p>Lokasi : <?php echo strlen($rows['venue']) > 15 ? substr($rows['venue'],0,15)."..." : $rows['venue']; ?></p>
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

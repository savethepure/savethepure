<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>

<!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Jumlah Users</span>
              <div class="count"><?php echo $jumlah_user; ?></div>
              <span class="count_bottom green">Lihat Detail</span>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Jumlah Transaksi</span>
              <div class="count"><?php echo $jumlah_transaksi; ?></div>
              <span class="count_bottom green">Lihat Detail</span>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i>Menunggu Verifikasi</span>
              <div class="count"><?php echo $t_menunggu; ?></div>
              <span class="count_bottom green">Lihat Detail</span>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Transaksi Lunas</span>
              <div class="count"><?php echo $t_lunas; ?></div>
              <span class="count_bottom green">Lihat Detail</span>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Transaksi Selesai</span>
              <div class="count"><?php echo $t_done; ?></div>
              <span class="count_bottom green">Lihat Detail</span>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Transaksi Belum dibayar</span>
              <div class="count"><?php echo $t_belum_bayar; ?></div>
              <span class="count_bottom green">Lihat Detail</span>
            </div>
            
          </div>
          <!-- /top tiles -->


          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Penjualan Product</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4>Total Jumlah Penjualan Product</h4>

                <?php foreach ($penjualan_products as $rows) { ?>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span><?php echo $rows['product_name']; ?></span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo $rows['count']; ?>" aria-valuemin="0" aria-valuemax="500" style="width: <?php echo $rows['count']; ?>%;">
                          <span class="sr-only"><?php echo $rows['count']; ?> pcs</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span><?php echo $rows['count']; ?> pcs</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                <?php } ?>
                  
                </div>
              </div>
            </div>



          
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

<?php include('static/footer.php'); ?>

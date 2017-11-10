<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>

<style>
	
	.buttonFinish, .stepContainer {
		display: none !important;
	}

</style>
<div class="right_col" role="main">
  <div class="">
    
  <div class="clearfix"></div>

  <div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Add Product</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">


          <!-- Smart Wizard -->
          <div id="wizard" class="form_wizard wizard_horizontal">
            <ul class="wizard_steps">
              <li>
                <a href="#step-1">
                  <span class="step_no">1</span>
                  <span class="step_descr">
                      Data Product<br />
                  </span>
                </a>
              </li>
              <li>
                <a href="#step-2">
                  <span class="step_no">2</span>
                  <span class="step_descr">
                      Data Content Product<br />
                  </span>
                </a>
              </li>
              
            </ul>
            <?php
			        echo form_open_multipart('products/save_product', 'class="form-horizontal form-label-left"');
			        ?>
            <div id="step-1">
            	
              <!-- <form class="form-horizontal form-label-left"> -->

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Product <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="nama_product" name="nama_product" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Deskripsi <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="last-name" name="deskripsi" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="ssadas-name" name="harga" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Upload  Photo <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" name="photoProduct" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

              <!-- </form> -->
              
              <!-- <div class="form-group">
              	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" style="text-align: right;">Foto Product <span class="required">*</span>
                  </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<form action="<?php echo base_url() ?>products/upload" class="dropzone"></form>
                </div>
              </div> -->

            </div>
            <div id="step-2">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="title" name="titel_konten" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Deskripsi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="deskripsi" name="deskripsi_konten" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <input type="submit" class="btn btn-info" style="top:5px;position: relative;left: 50%;transform: translateX(-50%);bottom:15px;" value="save">
            </div>
						

						<?php echo form_close(); ?>            

          </div>
          <!-- End SmartWizard Content -->

        </div>
      </div>
    </div>
  </div>
</div>
</div>


<?php include('static/footer.php'); ?>
<script>
	function handleChangeContent()
	{
		tipe = $('#tipeContent').val();
		if (tipe === 'video') {
			$('#video').removeClass('hide');
			$('#photo').addClass('hide');
		}
		else
		{
			$('#photo').removeClass('hide');
			$('#video').addClass('hide');
		}
		
	}
</script>

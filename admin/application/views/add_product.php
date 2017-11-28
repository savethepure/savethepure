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

					<form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?>products/save_product" class="form-horizontal form-label-left">
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
                <textarea type="text" id="ssadas-names" name="desc_text" required="required" class="form-control col-md-7 col-xs-12"></textarea>
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
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Upload  Photo Banner<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" name="photoProduct" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jumlah Warna <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" id="jumlah_warna" onchange="render_color()" required>
                  <option value="" selected disabled>Pilih Jumlah Warna</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </div>
            </div>
            <div id="render_warna">
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jumlah Size <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" id="jumlah_size" onchange="render_size()" required>
                  <option value="" selected disabled>Pilih Jumlah Size</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
            </div>
            <div id="render_size">
            </div>
            <div style="text-align: center;">
            	<button type="submit" class="btn btn-info">Simpan Product</button>
            </div>
            <!-- <div class="dropzone">

						  <div class="dz-message">
						   <h3> Klik atau Drop gambar disini</h3>
						  </div>

						</div> -->
					</form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<?php include('static/footer.php'); ?>
<script>
  function render_color() {
    jumlah_warna = $('#jumlah_warna').val();
    render = $('#render_warna');
    fill = "";
    for (var i = 0; i < jumlah_warna; i++) {
      fill += '<div class="form-group">';
      fill += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Warna '+ (i+1) +'<span class="required">*</span></label>';
      fill += '<div class="col-md-6 col-sm-6 col-xs-12">';
      fill += '<input type="text" name="warna[]" required="required" class="form-control col-md-7 col-xs-12">';
      fill += '</div>';
      fill += '</div>';
    }
    render.html(fill);
  }

  function render_size() {
    jumlah_size = $('#jumlah_size').val();
    render = $('#render_size');
    fill = "";
    for (var i = 0; i < jumlah_size; i++) {
      fill += '<div class="form-group">';
      fill += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Size '+ (i+1) +'<span class="required">*</span></label>';
      fill += '<div class="col-md-6 col-sm-6 col-xs-12">';
      fill += '<input type="text" name="size[]" required="required" class="form-control col-md-7 col-xs-12">';
      fill += '</div>';
      fill += '</div>';
    }
    render.html(fill);
  }

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

<script type="text/javascript">

Dropzone.autoDiscover = false;

var foto_upload= new Dropzone(".dropzone",{
url: "<?php echo base_url('products/upload') ?>",
maxFilesize: 2,
method:"post",
acceptedFiles:"image/*",
paramName:"userfile",
dictInvalidFileType:"Type file ini tidak dizinkan",
addRemoveLinks:true,
});


//Event ketika Memulai mengupload
foto_upload.on("sending",function(a,b,c){
	a.token=Math.random();
	c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
});


//Event ketika foto dihapus
foto_upload.on("removedfile",function(a){
	var token=a.token;
	$.ajax({
		type:"post",
		data:{token:token},
		url:"<?php echo base_url('products/remove_foto') ?>",
		cache:false,
		dataType: 'json',
		success: function(){
			console.log("Foto terhapus");
		},
		error: function(){
			console.log("Error");

		}
	});
});

</script>

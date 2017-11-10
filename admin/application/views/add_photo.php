<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>

<style>
	
	.buttonFinish, .stepContainer {
		display: none !important;
	}
	
	.item-photo {
		display: inline-block;
		margin: 5px;
	}	
	.item-photo img{
		width: 100px;
	}
	.link_hapus {
		background: rgba(0,0,0,0.6);
		color: #fff;
		text-align: center;
	}

	.link_hapus a {
		text-decoration: none;
		color: #fff !important;
	}
</style>
<div class="right_col" role="main">
  <div class="">
    
  <div class="clearfix"></div>

  <div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Add Photo</small></h2>

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
					<div>
						<h2>Current Photo</h2>
						<div class="table_photo">
						</div>
					</div>
					<hr>
					<form>
            <div class="dropzone">

						  <div class="dz-message">
						   <h3> Klik atau Drop gambar disini</h3>
						  </div>

						</div>
					</form>
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

<script type="text/javascript">

Dropzone.autoDiscover = false;
load_photo();

var foto_upload= new Dropzone(".dropzone",{
url: "<?php echo base_url().'products/upload/'.$id_product ?>",
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

function hapus_photo(var1,var2) {
	id_photo = var1;
	photo = var2;

	$.ajax({
		type:"post",
		data:{id_photo:id_photo, photo: photo},
		url:"<?php echo base_url('products/hapus_photo') ?>",
		cache:false,
		success: function(data){
			console.log(data);
			load_photo();
		},
		error: function(){
			console.log("Error");

		}
	});

}

function load_photo() {
	$.ajax({
		type:"post",
		data:{id_product:<?php echo $id_product; ?>},
		url:"<?php echo base_url('products/get_photo') ?>",
		cache:false,
		success: function(data){
			console.log(data);
			$('.table_photo').html(data);
		},
		error: function(){
			console.log("Error");

		}
	});
	
}


</script>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Order</title>
    <?php include('static/helmet.php'); ?>

    <?php include('static/header.php'); ?>
	 <link href="<?php echo UPLOAD_PRODUCT_URL ?>assets/see_order_assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="right_col" role="main">
	<div class="row">
		<!-- Basic Table -->
		<div class="col-sm-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Detail Order</h6>
						<table>
							<tr>
								<td><h6>Order ID</h6></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><h6><?php echo $head_order['uuid'] ?></h6></td>
							</tr>
							<tr>
								<td><h6>User ID</h6></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><h6><?php echo $head_order['id_user'] ?></h6></td>
							</tr>
							<tr>
								<td><h6>User Name</h6></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><h6><?php echo $head_order['fullname'] ?></h6></td>
							</tr>
							<tr>
								<td><h6>Receiver Name </h6></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><h6><?php echo $head_order['nama_penerima'] ?></h6></td>
							</tr>
							<tr>
								<td><h6>Shipment Address</h6></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><h6><?php echo $head_order['address'] ?></h6></td>
							</tr>
							<tr>
								<td><h6>Account Name</h6></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><h6><?php echo $head_order['nama_rekening_pengirim'] ?></h6></td>
							</tr>
							
						</table>
						<div class="col-md-4">
							<a href="<?php echo base_url() ?>see_order/change_status/<?php echo $head_order['uuid'] ?>">
								<button class="btn btn-info">Verifikasi</button>
							</a>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					
								<table class="table mb-0">
									<thead>
									  <tr>
										<th>#</th>
										<th>Product Name</th>
										<th>Color</th>
										<th>Size</th>
										<th>Qty</th>
										<th>Total Price</th>
									
									  </tr>
									</thead>
									<tbody>
									<?php $i = 1; ?>
							  		<?php foreach ($orders as $rows) { ?>
									  <tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $rows['product_name']; ?></td>
										<td><?php echo $rows['color']; ?></td>
										<td><?php echo $rows['size']; ?></td>
										<td><?php echo $rows['qty']; ?></td>
										<td><?php echo $rows['price']; ?></td>		
									  </tr>
									 <?php $i++; ?>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Basic Table -->
	</div>	
</div>
</body>
</html>
<?php include('static/footer.php'); ?>
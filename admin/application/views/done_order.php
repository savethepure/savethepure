<!DOCTYPE html>
<html>
<head>
	<title>Done Order</title>
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
					<div>
						<h6 class="panel-title txt-dark" style='text-align: center;'>Done Order List</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					
								<table class="table mb-0">
									<thead>
									  <tr>
										<th>#</th>
										<th>Order ID</th>
										<th>Name</th>
										<th>Total Price</th>
										<th>Tanggal</th>
									  </tr>
									</thead>
									<tbody>
									<?php $i = 1; ?>
									<?php foreach ($orders as $rows) { ?>
									  <tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $rows['uuid']; ?></td>
										<td><?php echo $rows['nama_penerima']; ?></td>
										<td><?php echo $rows['total']; ?></td>
										<td><?php echo $rows['tanggal']; ?></td>		
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
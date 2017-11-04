<!DOCTYPE html>
<html>
<head>
	<title>See Order</title>
	<?php include('static/helmet.php'); ?>
	 <link href="<?php echo base_url() ?>assets/see_order_assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="row">
		<!-- Basic Table -->
		<div class="col-sm-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div>
						<h6 class="panel-title txt-dark" style='text-align: center;'>Order List</h6>
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
										<th></th>
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
										<td class="form-group mb-0">
											<a href="<?php echo base_url() ?>see_order/detail_order/<?php echo $rows['uuid']; ?>"><button type="submit" class="btn btn-info">Detail</button></a>
										</td>			
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

</body>
</html>

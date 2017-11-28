<!DOCTYPE html>
<html>
<head>
	<title>See Order</title>
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
                                        <th>Status</th>
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
                                        <td>
	                                        <?php if ($rows['status_pembayaran'] == 0 ){ ?>
                                                <span class="label label-default">Not yet</span>
	                                        <?php } else if($rows['status_pembayaran'] == 1){ ?>
                                                <span class="label label-primary">Waiting For Payment</span>
	                                        <?php } else if($rows['status_pembayaran'] == 2){ ?>
                                                <span class="label label-success">Payment Complete</span>
	                                        <?php } else if($rows['status_pembayaran'] == 3){ ?>
                                                <span class="label label-success">Delivered</span>
	                                        <?php } else if($rows['status_pembayaran'] == 4){ ?>
                                                <span class="label label-danger" data-toggle="tooltip" data-placement="bottom" title="your payment is denied, please contact our team for further info">Denied</span>
	                                        <?php } else if($rows['status_pembayaran'] == 5){ ?>
                                                <span class="label label-danger" data-toggle="tooltip" data-placement="bottom" title="your payment is canceled, please contact our team for further info">Canceled</span>
	                                        <?php } else if($rows['status_pembayaran'] == 6){ ?>
                                                <span class="label label-warning" data-toggle="tooltip" data-placement="bottom" title="your payment is expire, Please click this button for reorder">Expire</span>
	                                        <?php } else if($rows['status_pembayaran'] == 7){ ?>
                                                <span class="label label-warning" data-toggle="tooltip" data-placement="bottom" title="Check Your Midtrans Dashboard for Accepting">Need Verification</span>
	                                        <?php } ?>
                                        </td>
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
</div>
</body>
</html>

<?php include('static/footer.php'); ?>
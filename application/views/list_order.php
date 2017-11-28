<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>

<title>Save The Pure | List Order</title>
<div class="wrapper-container u-py3">
    <hr>
        <h2 class="center mt1 bold">List Order</h2>
    <hr>
    <div class="col-12 sm-col-12 md-col-12 lg-col-12 mx-auto">      
        <table class="table table-cart">
            <thead>
            <tr>
                <th>Date</th>
                <th>Item</th>
                <th>Total Payment</th>
                <th>Shipping to</th>
                <th>Payment Status</th>
                <th>Invoice</th>
            </tr>
            </thead>
            <tbody>
                 <?php if (!empty($orders)) { ?>
                    <? foreach($orders as $order) { ?>
                        <tr>
                            <td><?php echo $order['tanggal'] ?></td>
                            <td><?php echo $order['item'] ?></td>
                            <td><?php echo $order['total'] ?></td>
                            <td>
                                <b>Recipient:</b> <?php echo $order['nama_penerima'] ?>
                                <br>
                                <b>Phone:</b> <?php echo $order['phone_penerima'] ?>
                                <br>
                                <b>Shipping Address:</b> <?php echo $order['address'] ?>
                            </td>
                            <td>
                                <?php if ($order['status_pembayaran'] == 0 ){ ?>
                                    <a href="<?php echo base_url().'checkout/payment/'.$order['uuid'] ?>"><span class="label label-default">Not yet</span></a>
                                <?php } else if($order['status_pembayaran'] == 1){ ?>
                                    <span class="label label-primary">Waiting For Payment</span>
                                <?php } else if($order['status_pembayaran'] == 2){ ?>
                                    <span class="label label-success">Processing</span>
                                <?php } else if($order['status_pembayaran'] == 3){ ?>
									<span class="label label-success">Delivered</span>
                                <?php } else if($order['status_pembayaran'] == 4){ ?>
                                    <span class="label label-danger" data-toggle="tooltip" data-placement="bottom" title="your payment is denied, please contact our team for further info">Denied</span>
                                <?php } else if($order['status_pembayaran'] == 5){ ?>
                                    <span class="label label-danger" data-toggle="tooltip" data-placement="bottom" title="your payment is canceled, please contact our team for further info">Canceled</span>
	                            <?php } else if($order['status_pembayaran'] == 6){ ?>
                                    <a href="<?php echo base_url().'checkout/payment/'.$order['uuid'] ?>"><span class="label label-warning" data-toggle="tooltip" data-placement="bottom" title="your payment is expire, Please click this button for reorder">Expire</span></a>
	                            <?php } else if($order['status_pembayaran'] == 7){ ?>
                                    <span class="label label-primary" data-toggle="tooltip" data-placement="bottom" title="your payment is being verified by our team">Verification</span>
                                <?php } ?>
                            </td>
                            <td>
	                            <?php if ($order['invoice_url'] != NULL){ ?>
                                <a href="<?php echo $order['invoice_url']; ?>"><span class="label label-primary">Invoice</span></a>
                                <?php } ?>
                            </td>
                        </tr>

                    <?php } ?>
                <?php } else { ?>
                    
                    <tr class="center">
                        <td colspan="5">
                            <h3>Order is empty</h3>
                            <a href="<?php echo base_url() ?>" class="btn btn-default mt3">Continue Shopping</a>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>

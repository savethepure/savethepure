<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>

<title>Save The Pure | Payment</title>

<div class="wrapper-container py3"> 
    <div class="login-container col-10 md-col-6 sm-col-8 mx-auto py20">
        <h3 class="mt0 mb2">Payment</h3>
        <hr>
        <?php if (!$already_process){ ?>
            <h5>
                Congratulation, your order has been record by our system, please click the button below to payment:
            </h5>
                <div class="panel panel-stp px3 py1" style="color:#252525;">
                    <h5 class="text-center">Recipient Information</h5>
                    <hr>
                    <p>Recipient : <?php echo $order['nama_penerima']?></p>
                    <p>Phone : <?php echo $order['phone_penerima']?></p>
                    <p>Alamat : <?php echo $order['address']?></p>
                    <p><b>Sub Total: IDR <?php echo $order['subtotal']?></b></p>
                    <p><b>Shipping cost: IDR <?php echo $order['shipping_cost']?></b></p>
                    <p><b>Grand Total: IDR <?php echo $total_amount?></b></p>
                </div>
            <div class="center">
                <button id="pay-button" class="btn btn-default bg-black" style="padding: 10px 30px">Pay Now!</button>
            </div>
            <span style="color: red;">Please transfer full amount of the invoice within <?php echo $expire?> days. <br>Please check your email for payment instruction.</span>

        <?php }else{ ?>
            <h5>
                Congratulation, your order has been record. <span style="color: red;">But you dont complete the transaction</span>. Click the button below to see how to complete transaction!
            </h5>
            <div class="panel panel-stp px3 py1" style="color:#252525;">
                <h5 class="text-center">Recipient Information</h5>
                <hr>
                <p>Recipient : <?php echo $order['nama_penerima']?></p>
                <p>Phone : <?php echo $order['phone_penerima']?></p>
                <p>Alamat : <?php echo $order['address']?></p>
                <p><b>Sub Total: IDR <?php echo $order['subtotal']?></b></p>
                <p><b>Shipping cost: IDR <?php echo $order['shipping_cost']?></b></p>
                <p><b>Grand Total: IDR <?php echo $total_amount?></b></p>
                <p><b>Expire: <?php echo date('Y-m-d H:i:s', strtotime($order['tanggal'] . ' +3 day'));?></b></p>
            </div>
            <div class="center">
                <a href="<?php echo $order['invoice_url']; ?>" class="btn btn-default bg-black" style="padding: 10px 30px">Complete Transaction Now!</a>
            </div>
        <?php } ?>
<!--        <h5>Congratulation, your order has been record by our system, please transfer to : </h5>-->
<!--        <div class="panel px1 py1" style="color:#252525;">-->
<!--            <div class="panel panel-stp px3 py1">-->
<!--                <img src="--><?php //echo base_url() ?><!--assets/img/logo/bca.png" alt="logo bca" width="32px">-->
<!--                <hr>-->
<!--                <p>Account Number : 5005186525</p>-->
<!--                <p>Account Name : Nadya Arina</p>-->
<!--                <p>Sub Total: IDR --><?php //echo $total_amount; ?><!--</p>-->
<!--                <p>Unique Transfer Code : --><?php //echo $id; ?><!--</p>-->
<!--                <p><b>Transfer Total: IDR --><?php //echo $total_amount+$id; ?><!--</b></p>-->
<!--                <small class="text-red"><i>*please transfer with the same value of transfer total</i></small>-->
<!--            </div>-->
            <!-- <div class="panel panel-stp px3 py1">
                <img src="<?php echo base_url() ?>assets/img/logo/bri.png" alt="logo bca" width="32px">
                <hr>
                <p>Account Number : 123-123-123</p>
                <p>Account Name : Save the Pure</p>
                <p>Sub Total: IDR <?php echo $total_amount; ?></p>
                <p>Unique Transfer Code : <?php echo $id; ?></p>
                <p><b>Transfer Total: IDR <?php echo $total_amount+$id; ?></b></p>
                <small class="text-red"><i>*please transfer with the same value of transfer total</i></small>
            </div>
            <div class="panel panel-stp px3 py1">
                <img src="<?php echo base_url() ?>assets/img/logo/mandiri.png" alt="logo bca" width="32px">
                <hr>
                <p>Account Number : 123-123-123</p>
                <p>Account Name : Save the Pure</p>
                <p>Sub Total: IDR <?php echo $total_amount; ?></p>
                <p>Unique Transfer Code : <?php echo $id; ?></p>
                <p><b>Transfer Total: IDR <?php echo $total_amount+$id; ?></b></p>
                <small class="text-red"><i>*please transfer with the same value of transfer total</i></small>
            </div>
            <div class="panel panel-stp px3 py1">
                <img src="<?php echo base_url() ?>assets/img/logo/bni.png" alt="logo bca" width="32px">
                <hr>
                <p>Account Number : 123-123-123</p>
                <p>Account Name : Save the Pure</p>
                <p>Sub Total: IDR <?php echo $total_amount; ?></p>
                <p>Unique Transfer Code : <?php echo $id; ?></p>
                <p><b>Transfer Total: IDR <?php echo $total_amount+$id; ?></b></p>
                <small class="text-red"><i>*please transfer with the same value of transfer total</i></small>
            </div> -->
<!--            <div class="panel panel-stp px3 py1">-->
<!--                <form action="--><?php //echo base_url() ?><!--checkout/completed_payment" method="post">-->
<!--                    <p class="center fs-12"><i>if you complete the payment please field this form :</i></p>-->
<!--                    <div class="form-group">-->
<!--                        <label for="account-name">Account name for transfer :</label>-->
<!--                        <input type="text" name="account_name" id="account-name" value="" class="form-control" placeholder="" required>-->
<!--                    </div>-->
<!--                    <input type="hidden" name="uuid" value="--><?php //echo $uuid ?><!--" readonly>-->
<!--                    <div class="center">-->
<!--                        <button type="submit" class="btn btn-default bg-black">i have completed the payment</button>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div> -->
<!--        </div>-->
    </div>
</div>
<script type="text/javascript"
        src="<?php echo $snap_url?>"
        data-client-key="<?php echo $client_key?>"></script>
<script>
//    var token;
    function get_token(callback) {
        $.ajax({
            url: '<?php echo base_url()?>checkout/get_token/<?php echo $uuid?>',
            type: 'GET',
            success: function(data) {
                callback(data.data.token, null);
            },
            error: function() {
                callback(null,new Error('Failed to fetch token'));
            }
        });
    }
    $('#pay-button').click(function(){
        snap.show();
        get_token(function(token, error){
            if(error){
                snap.hide();
                alert('Your Order Has Been Paid');
            }else{
                snap.pay(token,{
                    onSuccess: function(result){
                        if (result.status_code === "200"){
                            console.log(result);
                            var form_data_card = {
                                payment_type: result.payment_type,
                                order_id: result.order_id,
                                trans_id: result.transaction_id
                            };
                            $.post("<?php echo base_url()?>checkout/update_payment", form_data_card,
                                function(data)
                                {
                                    if(data.status === 200){
                                        window.location.href = "<?php echo base_url()?>member/account_order";
                                    }
                                })
                        }
                    },
                    onPending: function(result){
                        if (result.status_code === "201") {
                            var form_data = {
                                payment_type: result.payment_type,
                                order_id: result.order_id,
                                invoice: result.pdf_url,
                                trans_id: result.transaction_id
                            };
                            $.post("<?php echo base_url()?>checkout/update_payment", form_data,
                                function(data)
                                {
                                    if(data.status === 200){
                                        window.location.href = "<?php echo base_url()?>member/account_order";
                                    }
                                })
                        }
                    },
                    onError: function(result){
                        console.log(result)
                    },
                    onClose: function(){
                        console.log("close")
                    },
                    showOrderId: true
                });
            }
        });
    })
</script>

<?php include('static/footer.php'); ?>

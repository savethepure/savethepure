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
        <h5>Congratulation, your order has been record by our system, please transfer to : </h5>
        <div class="panel px1 py1" style="color:#252525;">
            <div class="panel panel-stp px3 py1">
                <img src="<?php echo base_url() ?>assets/img/logo/bca.png" alt="logo bca" width="32px">
                <hr>
                <p>Account Number : 5005186525</p>
                <p>Account Name : Nadya Arina</p>
                <p>Sub Total: IDR <?php echo $total_amount; ?></p>
                <p>Unique Transfer Code : <?php echo $id; ?></p>
                <p><b>Transfer Total: IDR <?php echo $total_amount+$id; ?></b></p>
                <small class="text-red"><i>*please transfer with the same value of transfer total</i></small>
            </div>
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
            <div class="panel panel-stp px3 py1">
                <form action="<?php echo base_url() ?>checkout/completed_payment" method="post">
                    <p class="center fs-12"><i>if you complete the payment please field this form :</i></p>
                    <div class="form-group">
                        <label for="account-name">Account name for transfer :</label>
                        <input type="text" name="account_name" id="account-name" value="" class="form-control" placeholder="" required>
                    </div>
                    <input type="hidden" name="uuid" value="<?php echo $uuid ?>" readonly>
                    <div class="center">
                        <button type="submit" class="btn btn-default bg-black">i have completed the payment</button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>

<?php include('static/footer.php'); ?>

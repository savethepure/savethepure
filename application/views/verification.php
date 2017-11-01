<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>

<title>Save The Pure | Verification</title>

<div class="wrapper-container py3"> 
    <div class="login-container col-10 md-col-10 sm-col-8 mx-auto py20">
        <h3 align="center" class="mt0 mb2">Verification</h3>
        <?php if ($status == 'Success') { ?>
            <h5 align ="center">your Verification is Successfull, you can login <a href="<?php echo base_url() ?>member/login">here</a> with your account.</h5>
        <?php } else { ?>
            <h5 align ="center">Your Verification is Failed, this might be an network error, please Refresh this page.</h5>
        <?php } ?>
    </div>
</div>

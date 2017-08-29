<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/header.php'); ?>

<title>Save The Pure | Login</title>

<div class="wrapper-container py3"> 
    <div class="login-container col-10 md-col-6 sm-col-8 mx-auto py20">
        <h3 class="mt0 mb0">Login</h3>
        <hr>
        <form action="<?php echo base_url() ?>member/do_login" method="post">
            <div class="form-group has-feedback">
                <label for="usr">Email:</label>
                <input type="text" class="form-control" id="email" name="email">
                <!-- <span class="glyphicon glyphicon-remove form-control-feedback"></span> -->
            </div>
            <div class="form-group has-feedback">
                <label for="usr">Password:</label>
                <input type="text" class="form-control" id="pass" name="password">
                <!-- <span class="glyphicon glyphicon-remove form-control-feedback"></span> -->
            </div>
            <a href="" class="center stp-link">
                <div class="small">forgot password?</div>
            </a>
            <div class="form-group mt3">
                <button type="submit" class="btn btn-link btn-block btn-stp--primary">Log In</button>
            </div>
            <a href="<?php echo base_url() ?>member/register" class="center stp-link">
                <div class="small">Create an Account</div>
            </a>
        </form>
    </div>
</div>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>

<title>Save The Pure | Register</title>

<div class="wrapper-container py3" style="min-height: 600px;"> 
    <div class="login-container col-10 md-col-6 sm-col-8 mx-auto py20">
        <h3 class="mt0 mb2">Register</h3>
        <?php if($this->session->flashdata('error') == TRUE){ ?>  
            <p>Error : <?php echo $this->session->flashdata('error'); ?></p>
        <?php } ?>
        <hr>
        <form action="<?php echo base_url() ?>member/do_register" method="post">
            <div class="form-group has-feedback">
                <label for="fullname">Full Name:</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required>
                 <!-- <span class="glyphicon glyphicon-remove form-control-feedback"></span> -->  
            </div>
            <div class="form-group has-feedback">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                 <!-- <span class="glyphicon glyphicon-remove form-control-feedback"></span>  -->
            </div>
            <div class="form-group has-feedback">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <!-- <span class="glyphicon glyphicon-remove form-control-feedback"></span> -->
            </div>
            <div class="form-group mt3">
                <button type="submit" class="btn btn-link btn-block btn-stp--primary">Register</button>
            </div>
            <a href="<?php echo base_url() ?>login" class="center stp-link">
                <div class="small">already have account? Login here</div>
            </a>
        </form>
    </div>
</div>

<?php include('static/footer.php'); ?>

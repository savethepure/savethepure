<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>

<title>Save The Pure | Forget Password</title>

<div class="wrapper-container py3"> 
    <div class="login-container col-10 md-col-6 sm-col-8 mx-auto py20">
        <h3 class="mt0 mb2">Forget Password</h3>
        <?php if($this->session->flashdata('error') == TRUE){ ?>  
            <p><?php echo $this->session->flashdata('error'); ?></p>
        <?php } ?>
        <hr>
        <form action="<?php echo base_url() ?>member/submit_forget" method="post">
            <div class="form-group has-feedback">
                <label for="usr">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
                <!-- <span class="glyphicon glyphicon-remove form-control-feedback"></span> -->
            </div>
            
            <div class="form-group mt3">
                <button type="submit" class="btn btn-link btn-block btn-stp--primary">Submit</button>
            </div>

        </form>
    </div>
</div>

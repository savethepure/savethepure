<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>

<div class="wrapper-container u-py3">
    <hr>
    <h2 class="center mt1">Sense By Save the Pure</h2>
    <hr>
	
	<div class="col-12 mb4 panel px1 py1" style="border: solid 2px #e0e0e0;">
		<div class="clearfix relative overflow-hidden">
			<div class="col lg-col-5 md-col-5 sm-col-12 col-12 event-photo">
				<img src="<?php echo base_url() ?>assets/img/events/<?php echo $events['picture']; ?>" width="100%" alt="">
			</div>
			<div class="col lg-col-7 md-col-7 sm-col-12 col-12">
				<div class="col-12 px3">
					<div class="clearfix col-12">
						<h3><b><?php echo $events['title_event']; ?></b></h3>
						<hr>
					</div>
					<div class="clearfix col-12">
						<blockquote class="blockquote">
						  <p class="mb-0"><?php echo $events['short_description']; ?></p>
						</blockquote>
					</div>
					<hr>
					<div class="col-12 overflow-hidden">
						<p><b>Venue :</b> <?php echo $events['venue']; ?></p>
						<p><b>Date :</b> <?php echo $events['date']; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<p><?php echo $events['description']; ?></p>

</div>

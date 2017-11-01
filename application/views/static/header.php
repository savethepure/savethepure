			<div class="wrapper-container">
				<div class="header relative">
						<div class="social-icon-wraps xs-hide">
							<!-- <a href="<?php echo base_url() ?>shop-location" class="social-icon menu-link"> -->
								<!-- <i class="fa fa-twitter"></i> -->
								<!-- Shop Location -->
							<!-- </a> -->
							<a href="https://www.youtube.com/channel/UCf_TAPqAHOrxv2xEzJgmw-A" class="social-icon" target="_blank">
								<i class="fa fa-youtube"></i>
							</a>
							<a href="https://www.facebook.com/savethepure" class="social-icon" target="_blank">
								<i class="fa fa-facebook"></i>
							</a>
							<a href="https://www.instagram.com/savethepure/" class="social-icon" target="_blank">
								<i class="fa fa-instagram"></i>
							</a>
						</div>
						
						<div class="mx-auto">
								<div class="int-menu center">
									<div class="menu-icon-wraps">
										<a href="<?php echo base_url() ?>" class="int-menu-icon" title="Home">
											<i class="fa fa-home"></i>
										</a>
										<a href="<?php echo base_url() ?>about" class="int-menu-icon" title="About US">
											<i class="fa fa-group about_icon--menu"></i>
										</a>
										<a href="<?php echo base_url() ?>events" class="int-menu-icon" title="News and Event">
											<i class="fa fa-globe"></i>
										</a>
										<a href="<?php echo base_url() ?>list_product" class="int-menu-icon" title="Product">
											<i class="fa fa-barcode"></i>
										</a>
										<a href="<?php echo base_url() ?>cart" class="int-menu-icon" title="Cart">
											<i class="fa fa-shopping-cart">
												<?php if ($this->cart->total_items() > 0) { ?>
												<span class="badge-int-menu">
													<?php echo $this->cart->total_items(); ?>
												</span>
												<?php } ?>
											</i>
										</a>
									</div>
								</div>
						</div>

						<div class="account-icon-wraps xs-hide">
							
							<?php
								if ($this->session->userdata('login'))
								{
									$name = explode(" ", $this->session->login['fullname']);
								?>  
									<div class="user-name dropdown">
										<p class="dropdown-toggle" data-toggle="dropdown" style="color:#252525;">
											<b>Welcome, <?php echo $name[0]; ?></b>
											<span class="caret"></span>  
										</p>
										<ul class="dropdown-menu">
											<li><a href="<?php echo base_url().'member/change_password/'.base64_encode($this->session->login['email']) ?>">Change Password</a></li>
											<li><a href="<?php echo base_url() ?>member/account_order">Order Status</a></li>
											<li class="divider"></li>
											<li><a href="<?php echo base_url() ?>member/logout">Log Out</a></li>
										</ul>
									</div>
							<?php }
								else
								{
							?>

							<a href="<?php echo base_url() ?>login" class="account-icon mr2 menu-link" title="Login">
								<!-- <i class="fa fa-unlock"></i> -->
								Login
							</a>
							<a href="<?php echo base_url() ?>register" class="account-icon menu-link">
								<!-- <i class="fa fa-pencil-square-o"></i> -->
								Register
							</a>

							<?php 
								}
							?>
						</div>

						<div class="mobile-menu-wraps md-hide lg-hide center">
							<div class="icon-wraps mt1">
								<!-- <a href="<?php echo base_url() ?>shop-location" class="icon-mobile menu-link mr3" > -->
									<!-- <i class="fa fa-twitter"></i> -->
									<!-- Shop Location -->
								<!-- </a> -->
								<a href="https://www.youtube.com/channel/UCf_TAPqAHOrxv2xEzJgmw-A" class="icon-mobile">
									<i class="fa fa-youtube"></i>
								</a>
								<a href="https://m.facebook.com/savethepure" class="icon-mobile">
									<i class="fa fa-facebook"></i>
								</a>
								<a href="https://www.instagram.com/savethepure/" class="icon-mobile">
									<i class="fa fa-instagram"></i>
								</a>

								<?php
								if ($this->session->userdata('login'))
								{
									$name = explode(" ", $this->session->login['fullname']);
								?>
								<span class="relative">
									<span class="dropdown-toggle" data-toggle="dropdown" style="border: solid 1px #252525;padding:5px;border-radius:9px;">
										<a href="" class="icon-mobile">
											<i class="fa fa-user"></i>
										</a>  
										<span class="user-name" style="color:#252525;margin-left:-9px;">
											<b><?php echo $name[0]; ?></b>
										</span>
									</span>
									<ul class="dropdown-menu">
										<li><a href="<?php echo base_url().'member/change_password/'.base64_encode($this->session->login['email']) ?>">Change Password</a></li>
										<li><a href="<?php echo base_url() ?>member/account_order">Order Status</a></li>
										<li class="divider"></li>
										<li><a href="<?php echo base_url() ?>member/logout">Log Out</a></li>
									</ul>
								</span>
							<?php }
								else
								{
							?>

								<a href="<?php echo base_url() ?>login" class="icon-mobile menu-link mr3">
									<!-- <i class="fa fa-unlock"></i> -->
									Login
								</a>
								<a href="<?php echo base_url() ?>register" class="icon-mobile menu-link">
									<!-- <i class="fa fa-pencil-square-o"></i> -->
									Register
								</a>

							<?php 
								}
							?>
							</div>
						</div>
				</div>
		</div>
		<div class="wrapper-container logo center">
				<div class="my2">
					<a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/img/stp-black.png" alt=""></a>
				</div>
		</div>
				

      <div class="wrapper-container">
        <div class="header relative">
            <div class="social-icon-wraps xs-hide">
              <a href="" class="social-icon">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="" class="social-icon">
                <i class="fa fa-facebook"></i>
              </a>
              <a href="" class="social-icon">
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
                      <i class="fa fa-group"></i>
                    </a>
                    <a href="<?php echo base_url() ?>event" class="int-menu-icon" title="Event">
                      <i class="fa fa-rocket"></i>
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
                      <li><a href="#">Account Setting</a></li>
                      <li><a href="<?php echo base_url() ?>member/account_order">Account Order</a></li>
                      <li class="divider"></li>
                      <li><a href="<?php echo base_url() ?>member/logout">Log Out</a></li>
                    </ul>
                  </div>
              <?php }
                else
                {
              ?>

              <a href="<?php echo base_url() ?>login" class="account-icon" title="Login">
                <i class="fa fa-unlock"></i>
              </a>
              <a href="<?php echo base_url() ?>register" class="account-icon">
                <i class="fa fa-pencil-square-o"></i>
              </a>

              <?php 
                }
              ?>
            </div>

            <div class="mobile-menu-wraps md-hide lg-hide center">
              <div class="icon-wraps mt1">
                <a href="" class="icon-mobile">
                  <i class="fa fa-twitter"></i>
                </a>
                <a href="" class="icon-mobile">
                  <i class="fa fa-facebook"></i>
                </a>
                <a href="" class="icon-mobile">
                  <i class="fa fa-instagram"></i>
                </a>

                <?php
                if ($this->session->userdata('login'))
                {
                  $name = explode(" ", $this->session->login['fullname']);
                ?>
                  <span style="border: solid 1px #252525;padding:5px;border-radius:9px;">
                    <a href="" class="icon-mobile">
                      <i class="fa fa-user"></i>
                    </a>  
                    <span class="user-name" style="color:#252525;margin-left:-9px;">
                      <b><?php echo $name[0]; ?></b>
                    </span>
                  </span>
              <?php }
                else
                {
              ?>

                <a href="" class="icon-mobile">
                  <i class="fa fa-unlock"></i>
                </a>
                <a href="" class="icon-mobile">
                  <i class="fa fa-pencil-square-o"></i>
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
        
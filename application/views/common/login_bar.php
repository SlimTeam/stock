<div class="container" >
  <div class="row xs-center">
    <a href="<?php echo base_url(); ?>" style="color:inherit">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
        <img src="<?php echo base_url("assets/images/logo.jpg"); ?>" >
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h1><?php echo $this->lang->line('app_title'); ?></h1>
      </div>
    </a>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
      <div class="nav nav-pills" style="margin-top:20px;">
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) { ?>
          
          <!-- ADMIN ACCESS ONLY -->
          <?php if ($_SESSION['user_access'] >= ACCESS_LVL_MSP) { ?>
              <a href="<?php echo base_url("admin/"); ?>" ><?php echo $this->lang->line('btn_admin'); ?></a><br />
          <?php } ?>
          <!-- END OF ADMIN ACCESS -->

          <!-- Password change -->
          <a href="<?=base_url("auth/change_password");?>"><?=$this->lang->line('btn_change_password')?></a><br />
          
          <!-- Logged in, display a "logout" button -->
          <a href="<?php echo base_url("auth/logout"); ?>" ><?php echo $this->lang->line('btn_logout'); ?></a>

        <?php } else { ?>
          <!-- Not logged in, display a "login" button -->
          <a href="<?php echo base_url("auth/login"); ?>" ><?php echo $this->lang->line('btn_login'); ?></a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<hr />

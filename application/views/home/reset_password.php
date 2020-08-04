<style>
  
</style>
<link rel="stylesheet" href="<?php echo base_url()?>css/daftar.css">
<div class="container-fluid">
  <?php if ($this->session->flashdata('msg')): ?>
    <div class="alert alert-success" role="alert">
      <?php echo $this->session->flashdata('msg'); ?>
    </div>
  <?php endif ?>

<div class="row" style="background-color: #FFFFFF ; padding-left: 5vh; padding-right: 20vh; color: black;">
</div>
<div class="row">
  <div class="side col" >
  <img src="<?php echo base_url()?>images/logo.png" style="width:480px; height:140px; position: absolute; left: 500px; top: 40px;">
  </div>
  <div class="col-md-4 py-3" style=" background-color: #D7D7D7;" >
  <h5 style="font-weight: bolder; color: black; padding-left: 10em; margin-top: 5px; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Reset Password</strong></h5></br></br>
      <?php $last = $this->uri->total_segments();
            $reset = $this->uri->segment($last);
      ?>
      <?php echo form_open('Register/reset_password/'.$reset);?>
          
          <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi (Min 8 huruf, Terdapat Huruf Besar dan Angka)" value="<?php echo set_value('password'); ?>"  >

            <small class="form-text text-danger"><?php echo form_error('password'); ?></small>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" name="password_conf" placeholder="Ulangi Kata Sandi" value="<?php echo set_value('password_conf'); ?>"  >

            <small class="form-text text-danger"><?php echo form_error('password_conf'); ?></small>
          </div>
          
          <div class="col-md-12" style="padding-left:12em;">
          <button type="submit" name="btnSubmit" class="btn btn-outline-dark" style="background: #BD0306; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 7px;font-weight: bold; font-size: 20px; font-family: Lato; color:white; " value="Daftar">Submit</button>              
        </div>
      <?php echo form_close();?>           
      
  </div>
</div>
</div>

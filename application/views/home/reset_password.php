<style>
  
</style>
<link rel="stylesheet" href="<?php echo base_url()?>css/daftar.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/templatemo-main.css">
<div class="container-fluid">
  <?php if ($this->session->flashdata('msg')): ?>
    <div class="alert alert-success" role="alert">
      <?php echo $this->session->flashdata('msg'); ?>
    </div>
  <?php endif ?>

  <div class="row" style="background-color: #FFFFFF ; padding-left: 5vh; padding-right: 20vh; color: black;">
</div>
<div class="row">
  <div class="side col">
    <img src="<?php echo base_url()?>images/logo.png" style="width:400px;  position: absolute; left: 500px; top: 40px;">
  </div>
  <div class="col-md-4 py-3" style=" background-color: #D7D7D7;" >
    <div class="row-sm-6">
    </div>
    <div class="row-sm-6 text-center" style="">
      <h5 style="font-weight: bolder; color: black; margin-top: 11em; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Reset Password</strong></h5></br></br>
    </div>
    <div class="row-sm-6">
    </div>
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
          <div class="row-sm-6" style="margin-top:3em;">
          </div>
          <div class="row-sm-6 text-center">
          <button type="submit" name="btnSubmit" class="btn btn-outline-dark" style="padding:5px; font-size:15px; text-transform: capitalize; " value="Daftar">Submit</button>              
          </div>
          <div class="row-sm-6" style="margin-bottom:14em;" >
      </div>
      <?php echo form_close();?>           
  </div>
</div>
</div>

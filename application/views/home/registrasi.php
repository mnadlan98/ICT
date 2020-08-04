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
  <div class="side col" >
  <img src="<?php echo base_url()?>images/logo.png" style="width:400px; position: absolute; left: 500px; top: 40px;">
  </div>
  <div class="col-md-4 py-3" style=" background-color: #D7D7D7;" >
  <div class="row-sm-6">
      </div>
      <div class="row-sm-6 text-center" style="">
        <h5 style="font-weight: bolder; color: black; margin-top: 2em; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Daftar</strong></h5></br></br>
      </div>
      <div class="row-sm-6">
      </div>
      <?php echo form_open('Register/index');?>
          <div class="form-group">
            <select class="form-control" id="jenjang_sekolah" name="jenjang_sekolah" required>
              <option selected disabled hidden>Jenjang Sekolah</option>
              <option value="SLB">SLB</option>
              <option value="SD">SD</option>
              <option value="SMP">SMP</option>
              <option value="SMK">SMK</option>
              <option value="SMA">SMA</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="kota_sekolah" name="kota_sekolah" placeholder="Kota/Kabupaten" value="<?php echo set_value('kota_sekolah'); ?>"  >
            <small class="form-text text-danger"><?php echo form_error('kota_sekolah'); ?></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" placeholder="Nama Sekolah" value="<?php echo set_value('nama_sekolah'); ?>"  >
            <small class="form-text text-danger"><?php echo form_error('nama_sekolah'); ?></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="email_sekolah" name="email_sekolah"  placeholder="Email Sekolah" value="<?php echo set_value('email_sekolah'); ?>"  >
            <small class="form-text text-danger"><?php echo form_error('email_sekolah'); ?></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="notelp_sekolah" name="notelp_sekolah" placeholder="Nomor Telepon Sekolah" value="<?php echo set_value('notelp_sekolah'); ?>"  >

            <small class="form-text text-danger"><?php echo form_error('notelp_sekolah'); ?></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Nama Pengguna" value="<?php echo set_value('nama_user'); ?>" >

            <small class="form-text text-danger"><?php echo form_error('nama_user'); ?></small>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email_user" name="email_user" placeholder="Email Pengguna" value="<?php echo set_value('email_user'); ?>"  >

            <small class="form-text text-danger"><?php echo form_error('email_user'); ?></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="notelp_user" name="notelp_user" placeholder="Nomor Telepon Pengguna" value="<?php echo set_value('notelp_user'); ?>"  >

            <small class="form-text text-danger"><?php echo form_error('notelp_user'); ?></small>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi (Min 8 huruf, Terdapat Huruf Besar dan Angka)" value="<?php echo set_value('password'); ?>"  >

            <small class="form-text text-danger"><?php echo form_error('password'); ?></small>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" name="password_conf" placeholder="Ulangi Kata Sandi" value="<?php echo set_value('password_conf'); ?>"  >

            <small class="form-text text-danger"><?php echo form_error('password_conf'); ?></small>
          </div>
          <div class="form-group">
            <?php echo $captcha_img;?>
          
            <input type="Text" name="captcha" placeholder="Masukkan Kode Captcha"><br>
            <small class="form-text text-danger"><?php echo form_error('captcha'); ?></small>
          </div>
          <div class="row-sm-6">
          </div>
          <div class="row-sm-6 text-center" style="">
          <button type="submit" name="btnSubmit" class="btn" style="padding:5px; font-size:15px; text-transform: capitalize;" value="Daftar">Daftar</button>    
          <p style="font-size:13px;font-family: Lato; padding-top:10px;">Sudah punya akun? <a href="<?php echo base_url().'Login/index';?>" style="color: light-blue; text-decoration: none; font-size:15px; font-family: Lato;"><small><u>Masuk Disni</u></small></a></p>          
          </div>
          <div class="row-sm-6">
          </div>
      <?php echo form_close();?>
             
      
  </div>
</div>
</div>

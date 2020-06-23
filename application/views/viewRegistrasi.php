 
   <div class="container" style="margin-top: 150px; margin-bottom: 150px;">
    <div class="row mt-3">
      <div class="col">
        <div class="card">
          <div class="text-center">
            <h3>Daftar</h3>
          </div>
          <?php
            echo "<p>". $this->session->flashdata('message')."</p>"; 
          ?>
          <div class="card-body">
            
            <form action="<?php base_url('Daftar/input') ?>" method="post">
              <!-- Kode Sekolah -->  
              <div class="form-group">
                <input type="text" class="form-control" id="kode_sekolah" name="Kode_Sekolah" placeholder="Kode Sekolah">
                <small class="form-text text-danger"><?= form_error('kode_sekolah') ?></small>
              </div>
              <!-- Nama Sekolah -->  
              <div class="form-group">
                <input type="text" class="form-control" id="nama_sekolah" name="Nama_Sekolah" placeholder="Nama Sekolah">
                <small class="form-text text-danger"><?= form_error('nama_sekolah') ?></small>
              </div>
              <!-- Email -->
              <div class="form-group">
                <input type="email" class="form-control" id="email_sekolah" name="Email_Sekolah" placeholder="Email Sekolah">
                <small class="form-text text-danger"><?= form_error('email_sekolah') ?></small>
              </div>
              <!-- Username -->
              <div class="form-group">
                <input type="text" class="form-control" id="alamat_sekolah" name="Alamat_Sekolah" placeholder="Alamat Sekolah">
                <small class="form-text text-danger"><?= form_error('alamat_sekolah') ?></small>
              </div>
              <!-- Password -->
              <div class="form-group">
                <input type="number" class="form-control" id="notelp_sekolah" name="notelp_sekolah" placeholder="No. Telp Sekolah">
                <small class="form-text text-danger"><?= form_error('notelp+sekolah') ?></small>
              </div>
              <!-- Password -->
              <div class="form-group">
                <input type="email" class="form-control" id="email_user" name="email_user" placeholder="Email Pengguna">
                <small class="form-text text-danger"><?= form_error('password') ?></small>
              </div>
              <!-- Password -->
              <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi">
                <small class="form-text text-danger"><?= form_error('password') ?></small>
              </div>
              <!-- Password -->
              <div class="form-group">
                <input type="password" class="form-control" id="re_password" name="re_password" placeholder="Ulangi Kata Sandi">
                <small class="form-text text-danger"><?= form_error('password') ?></small>
              </div>
              <center>
              	<button type="submit" name="send" class="btn btn-success" style="background-color: black;">Submit</button>
              </center>   
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
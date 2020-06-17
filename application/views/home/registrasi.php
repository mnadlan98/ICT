 
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
              <!-- Name -->  
              <div class="form-group">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Name">
                <small class="form-text text-danger"><?= form_error('nama') ?></small>
              </div>
              <!-- Email -->
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                <small class="form-text text-danger"><?= form_error('email') ?></small>
              </div>
              <!-- Username -->
              <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                <small class="form-text text-danger"><?= form_error('username') ?></small>
              </div>
              <!-- Password -->
              <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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
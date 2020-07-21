<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Welcome</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="http://localhost/ICT/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/fontAwesome.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/hero-slider.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/templatemo-main.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/owl-carousel.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/profil.css?version=51">
        <link rel="stylesheet" href="http://localhost/ICT/css/animate.min.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800" rel="stylesheet">

        <script src="http://localhost/ICT/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <style type="text/css">
          label{color: #222;font-weight: bolder;}
          input{height: 3.3em !important;}
          .btn:hover{height: 3.3em !important;}
        </style>
    </head>

<body>
    <?php $str=explode('@',$this->session->userdata('email_user'))?>
    <section>
      <div class="container-fluid">
        <h5 style="font-weight: bolder; color: white; margin-top: 5px; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Profil</strong></h5></br></br>
        <div class="row">
          <div class="col-md-2">
            <img src="../images/avatar.png">
            <div class="form-group row" style="margin-top: 20px; color:white;">          
            </div>
          </div>  
          <?php echo form_open_multipart('MainController/editProfile');?> 
          <form action="" method="post" >
            <div class="form-group row">
              <div>
                <label style="font-size:15px; color:white;">Nama :</label>
              </div>
              <input type="text" class="form-control" id="nama_user" name="nama_user"  value=<?= $this->session->userdata("user")['nama_user'] ?>  >
              <small class="form-text text-danger"><?php echo form_error('nama_user'); ?></small>
            </div>
            <div class="form-group row">
              <div>
                <label style="font-size:15px; color:white;">Email User : </label>
              </div>
              <input type="text" class="form-control" id="email_user" name="email_user" value=<?= $this->session->userdata("user")['email_user'] ?>  >
              <small class="form-text text-danger"><?php echo form_error('email_user'); ?></small>
            </div>
            <div class="form-group row">
              <div>
                <label style="font-size:15px; color:white;">No. Telp User :</label>
              </div>
              <input type="text" class="form-control" id="notelp_user" name="notelp_user"  value=<?= $this->session->userdata("user")['notelp_user'] ?>   >
              <small class="form-text text-danger"><?php echo form_error('notelp_user'); ?></small>
            </div>
            <div class="form-group row">
              <div>
                <label style="font-size:15px; color:white;">Nama Sekolah : </label>
              </div>
              <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" value=<?= $this->session->userdata("user")['nama_sekolah'] ?>   >
              <small class="form-text text-danger"><?php echo form_error('nama_sekolah'); ?></small>
            </div>
            <div class="form-group row">
              <div>
                <label style="font-size:15px; color:white;">Email Sekolah : </label>
              </div>
              <input type="text" class="form-control" id="email_sekolah" name="email_sekolah" value=<?= $this->session->userdata("user")['email_sekolah'] ?>   >
              <small class="form-text text-danger"><?php echo form_error('email_sekolah'); ?></small>
            </div>
            <div class="form-group row">
              <div>
                <label style="font-size:15px; color:white;">No. Telp Sekolah : </label>
              </div>
              <input type="text" class="form-control" id="notelp_sekolah" name="notelp_sekolah" value=<?= $this->session->userdata("user")['notelp_sekolah'] ?>   >
              <small class="form-text text-danger"><?php echo form_error('notelp_sekolah'); ?></small>
            </div>
            <button type="submit" name="login" class="btn btn-outline-dark" style="background: #BD0306; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 7px;font-weight: bold; font-size: 20px; font-family: Lato; color:white; border-color:white; ">Update</button>
          </div>
        </div>      
        </form>
        <?php echo form_close();?>  
      </div>
    </section>

</body>


<script src="http://localhost/ICT/script/wow.min.js"></script>
<script src="http://localhost/ICT/script/wow.js"></script>
<script src="http://localhost/ICT/script/main.js"></script>
<script src="http://localhost/ICT/script/datatables-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        
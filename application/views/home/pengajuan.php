<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Welcome</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="http://localhost/ICT-gunung/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/ICT-gunung/css/fontAwesome.css">
        <link rel="stylesheet" href="http://localhost/ICT-gunung/css/hero-slider.css">
        <link rel="stylesheet" href="http://localhost/ICT-gunung/css/templatemo-main.css">
        <link rel="stylesheet" href="http://localhost/ICT-gunung/css/owl-carousel.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="http://localhost/ICT-gunung/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body style="background-image: url(../images/8.jpg); ">
<div class="col-md-5 py-3" style="margin-left:24em; margin-top: 1em;" >
  <h5 style="font-weight: bolder; color: black; padding-left: 9em; color:white; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Pengajuan ICT Tour</strong></h5></br></br>
     <?php // form_open(base_url('MainController/register')); ?> 
     <form method="post">
          <div class="row">
            <div>
              <label style="font-size:15px; color:white; padding-right:3.42em;">Jumlah Siswa      </label>
            </div>
            <div class="form-group col">
              <input type="text" class="form-control" id="jumlah_siswa" name="jumlah_siswa" style="margin-left:12em; box-shadow: inset 3px 3px 4px rgba(0, 0, 0, 0.25)">
            </div>
          </div>
          <div class="row" style="padding-right:2px">
            <div>
              <label style="font-size:15px; color:white;">Tanggal Pelaksanaan</label>
            </div>
            <div class="form-group col">
              <input type="date" class="form-control" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" style="margin-left:12.2em; box-shadow: inset 3px 3px 4px rgba(0, 0, 0, 0.25)">
            </div>
          </div>
          <div class="row">
            <div>
              <label style="font-size:15px; color:white;">Nama Pembimbing 1</label>
            </div>
            <div class="form-group col">
              <input type="text" class="form-control" id="pembimbing1" name="pembimbing1" style="margin-left:12em; box-shadow: inset 3px 3px 4px rgba(0, 0, 0, 0.25)">
            </div>
          </div>
          <div class="row">
            <div>
              <label style="font-size:15px; color:white;">Nama Pembimbing 2</label>
            </div>
            <div class="form-group col">
              <input type="text" class="form-control" id="pembimbing2" name="pembimbing2" style="margin-left:12em; box-shadow: inset 3px 3px 4px rgba(0, 0, 0, 0.25)">
            </div>
          </div>
          <div class="row">
            <div>
              <label style="font-size:15px; color:white;">Unggah Surat Permohonan</label>
            </div>
            <div class="form-group col">
              <input type="file" class="form-control-file" id="surat_permohonan" style="margin-left:9.5em; color:white;">
            </div>
          </div>
           <div class="row">
            <div>
              <label style="font-size:15px; color:white;">Unggah Daftar Peserta (.csv / .xlsx)</label>
            </div>
            <div class="form-group col">
              <input type="file" class="form-control-file" id="daftar_peserta" style="margin-left:6.52em; color:white;">
            </div>
          </div>          
          <div class="row" style="padding-right:1.75em;">
            <div>
              <label style="font-size:15px; color:white;">Kabupaten / Kota</label>
            </div>
            <div class="form-group col">
              <select class="form-control" id="kantor" style="margin-left:13.5em;">
                <option>Default select</option>
              </select>
            </div>
          </div>  
          <div class="row" style="padding-right:1.75em;">
            <div>
              <label style="font-size:15px; color:white; margin-right:17px">Kantor Cabang</label>
            </div>
            <div class="form-group col">
              <select class="form-control" id="kantor" style="margin-left:13.5em;">
                <option>Default select</option>
              </select>
            </div>
          </div>
         

          <div class="form-check" style="margin-left:6em;">
            <input class="form-check-input" type="checkbox" id="checkbox_policy">
            <label class="form-check-label" for="checkbox_policy" style="color:white; margin-left:12px; ">Saya menyetujui <a href="#">syarat dan ketentuan</a> yang berlaku</label>
          </div> </br>
          <div class="col-md-12" style="padding-left:15em;">
          <button type="submit" name="login" class="btn btn-outline-dark" style="background: #BD0306; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 7px;font-weight: bold; font-size: 20px; font-family: Lato; color:white; border-color:white; ">Kirim</button>              
        </div>
        <div class="form-group" style="margin-bottom:0em; margin-left:2em;">
          <p style="font-size:15px; margin-left:8.5em; font-family: Lato; padding-top:10px; color:white;">Unduh template surat pengajuan <a href="<?php echo base_url().'MainController/viewRegistrasi';?>" style="color: light-blue; text-decoration: none; font-size:15px; font-family: Lato;"><small><u>Disini</u></small></a></p>
        </div>               
        </form>
  </div>
</body>
</html>
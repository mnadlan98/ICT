<!DOCTYPE html>
<html>
    <head>
        <style>
          hr.onepixel {
            border-top: 1px solid #afbcc6;
            border-bottom: 1px solid #eff2f6;
            height: 0px;
            margin-bottom: 20px;
        }
        </style>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Welcome</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>css/fontAwesome.css">
        <link rel="stylesheet" href="<?php echo base_url()?>css/hero-slider.css">
        <link rel="stylesheet" href="<?php echo base_url()?>css/templatemo-main.css">
        <link rel="stylesheet" href="<?php echo base_url()?>css/owl-carousel.css">
        <link rel="stylesheet" href="<?php echo base_url()?>css/pengajuan.css?v=6">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800" rel="stylesheet">

        <script src="<?php echo base_url()?>js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>
  <?php if ($this->session->flashdata('msg')): ?>
    <div class="alert alert-success" role="alert">
      <?php echo $this->session->flashdata('msg'); ?>
    </div>
  <?php endif ?>
  
<div class="row">
<div class="col-sm-3">
</div>
<div class="col-sm-6" >
<div class="row">
      <div class="col-sm-9">
      </div>
      <div class="col-sm-9 text-center" style="">
      <h5 style="font-weight: bolder; color: black; margin-left: 15em; color:white; margin-top:5em; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Pengajuan ICT Tour</strong></h5></br></br>
      </div>
      <div class="col-sm-9">
      </div>
  </div>
  <div class="row-md-10">
  <?php echo form_open_multipart('Pengajuan');?> 
     <form method="post">
          <hr class="onepixel">
          <h5 style="font-weight: bolder; color: black;  color:white; "><strong style=" font-size:14px; ">Data Pengajuan</strong></h5><br>
          <div class="row">
            <div class="col-sm-5">
              <label style="font-size:15px; color:white; padding-right:3.1em;">Jumlah Siswa (Maksimum 30)</label>
            </div>
            <div class="form-group col-xs-2">
              <input type="number" class="form-control " id="jumlah_siswa" name="jumlah_siswa" min="1" max="30" style=" box-shadow: inset 3px 3px 4px rgba(0, 0, 0, 0.25)">
            </div>
          </div>
          <label style="font-size:10px; color:red;"><?php echo form_error('jumlah_siswa'); ?></label>
          <div class="row">
            <div class="col-sm-5">
              <label style="font-size:15px; color:white;">Nama Pembimbing 1</label>
            </div>
            <div class="form-group col">
              <input type="text" class="form-control" id="pembimbing1" name="pembimbing1" style=" box-shadow: inset 3px 3px 4px rgba(0, 0, 0, 0.25)">
            </div>
          </div>
          <label style="font-size:10px; color:red;"><?php echo form_error('pembimbing1'); ?></label>
          <div class="row">
            <div class="col-sm-5">
              <label style="font-size:15px; color:white;">Nama Pembimbing 2</label>
            </div>
            <div class="form-group col">
              <input type="text" class="form-control" id="pembimbing2" name="pembimbing2" style=" box-shadow: inset 3px 3px 4px rgba(0, 0, 0, 0.25)">
            </div>
          </div>
          <label style="font-size:10px; color:red;"><?php echo form_error('pembimbing2'); ?></label>
          <div class="row" >
          <div class="col-sm-5">
              <label style="font-size:15px; color:white;">Tanggal Pelaksanaan</label>
            </div>
            <div class="form-group col">
              <input type="date" class="form-control" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" style=" box-shadow: inset 3px 3px 4px rgba(0, 0, 0, 0.25)">
            </div>
          </div>
          <label style="font-size:10px; color:red;"><?php echo form_error('tanggal_pelaksanaan'); ?></label>
          <div class="row">
          <div class="col-sm-5">
              <label style="font-size:15px; color:white;">Unggah Surat Permohonan (.pdf)</label>
            </div>
            <div class="form-group col">
              <input type="file" class="form-control-file" name="surat_permohonan" id="surat_permohonan" style=" color:white;" required>
              <label style="font-size:10px; color:white;">max 2 MB</label>
            </div>
          </div>
          
           <div class="row">
           <div class="col-sm-5">
              <label style="font-size:15px; color:white;">Unggah Daftar Peserta (.csv / .xlsx)</label>
            </div>
            <div class="form-group col">
              <input type="file" class="form-control-file" name="daftar_peserta" id="daftar_peserta" style="color:white;" required>
              <label style="font-size:10px;  color:white;">max 2 MB</label>
            </div>
          </div>         
           
          <p style="font-size:15px; padding-top:10px; color:white;">Contoh Template Daftar Peserta <a href="<?php echo base_url("./excel/daftar_peserta.csv"); ?>" style="color: light-blue; text-decoration: none; font-size:15px; font-family: Lato;"><small><u>Unduh</u></small></a></p>  
          <hr class="onepixel">
          <h5 style="font-weight: bolder; color: black;  color:white; "><strong style=" font-size:14px; ">Lokasi ICT Tour</strong></h5><br>
          <div class="row" style="padding-right:1.75em; margin-bottom:20px;">
          <div class="col-sm-5">
              <label style="font-size:15px; color:white;">Provinsi      </label>
            </div>
            <div class="form-group col">
              <select class="form-control" id="kantor" name="kantor" >
                <option selected>Jawa Barat</option>
              </select>
            </div>
          </div>
          
          <div class="row" style="padding-right:1.75em; margin-bottom:20px;">
          <div class="col-sm-5">
              <label style="font-size:15px; color:white; margin-right:6px">Kota/Kabupaten</label>
            </div>
            <div class="form-group col">
              <select class="form-control" id="wilayah" name="wilayah"  required>
                <option value="">Pilih Kota/Kabupaten ...</option>
                <?php foreach($wilayah as $row):?>
                <option value="<?php echo $row->id_wilayah;?>"><?php echo $row->wilayah?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="row" style="padding-right:1.75em; margin-bottom:20px;">
          <div class="col-sm-5">
              <label style="font-size:15px; color:white; margin-right:17px">Kantor Telkom</label>
            </div>
            <div class="form-group col">
              <select class="form-control" id="sto" name="sto"  required>
                <option value="">Pilih Lokasi Kantor Telkom ...</option>             
              </select>
            </div>
          </div>
    
          <div class="form-check" style="margin-left:12em;">
            <input type="hidden" name="checkbox_policy" value="0">
            <input class="form-check-input" type="checkbox" id="checkbox_policy" name="checkbox_policy" value="1">
            <label class="form-check-label" for="checkbox_policy" style="color:white; margin-left:12px; ">Saya menyetujui <a href="#" style="color:dodgerblue" data-toggle="modal" data-target="#myModal">syarat dan ketentuan</a> yang berlaku</label>
          </div> </br>
          <div class="row-sm-6">
          </div>
          <div class="row-sm-6 text-center" style="">
          <button type="submit" name="submit" class="btn" style="background: #BD0306; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 27px;font-weight: bold; font-size: 15px; font-family: Lato; color:white; border-color:white; margin-bottom:8em; ">Kirim</button>        
          </div>
          <div class="row-sm-6">
          </div>
        </div>
        <?php echo form_close();?>                
      </form>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-dialog-centered">
          <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Syarat dan Ketentuan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <div class="modal-body">
                <?php $i=0;?>
                <?php foreach ($term as $s):?>
                <p><?php echo $i+=1; ?>. <?php echo $s->kalimat ?></p>
                <?php endforeach; ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  </div>
  </div>
  <div class="col-sm-2 ">
</div>
</div>


</body>
</html>
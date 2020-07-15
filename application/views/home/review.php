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
        <link rel="stylesheet" href="http://localhost/ICT/css/review.css">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800" rel="stylesheet">
        
    </head>
    <?php 
        $status = array();
        $koneksi = mysqli_connect("localhost", "root", "", "ict");
        $user = $this->session->userdata("user")['id'];
        $query = $this->db->get_where('pengajuan', array('id_user' => $user));
        $data   = $query->result_array();
        foreach ($data as $row){
          echo "<tr>
              <td>".$row['status_pengajuan']."</td>
                </tr>";
        }
        $status = (float)$row['status_pengajuan'] * 25;
        $status = '"width:'.$status.'%"';

      ?>

<body >
    <section class="wow fadeInRight" id="progress">
      <div class="section-header">
        <h2 ><strong style="font-size: 30px; border-bottom:2px solid red">Progress Pengajuan</strong></h2>
        <p>Tinjau progress pengajuan</p>
        <p><?php echo $status ?></p>
      </div>
      <div class="progress" style="margin-left:10px; margin-right:10px;">
        <div class="progress-bar" role="progressbar"  style=<?php echo $status ?>>
        </div>
      </div>
      <div class="row" style="color:black; margin-bottom:20px; margin-top:20px; margin-left:1px;">
            <div class="col"><p>Pengajuan</p></div>
            <div class="col"><p>Review Pengajuan</p></div>
            <div class="col"><p style="margin-left:10em;">Verifikasi Pengajuan</p></div>
            <div class="col" ><p style="margin-left:18em;">Hasil Pengajuan</p></div>
          </div>
      <div class="row">
        <div class="col-lg-3">
            <div class="box wow fadeInLeft" >
              <h4>Page</h4>
            </div>
        </div>
        <div class="col-lg-3">
          <div class="box wow fadeInRight">
            <h4>Page</h4>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="box wow fadeInLeft" data-wow-delay="0.2s" >
            <h4>Page</h4>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="box wow fadeInRight" data-wow-delay="0.2s" >
              <h4>Page</h4>
          </div>
        </div>
      </div>
    </section>
</body>


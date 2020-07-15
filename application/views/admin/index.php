<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("admin/_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">

    <!-- Icon Cards-->
    <?php if ($this->session->userdata("admin")['level']==1): ?>
      <div class="row">
      <?php for($x = 0; $x <= 5; $x++) { ?>
      <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
        <h4 class="text-body font-weight-bold">Witel <?php echo $nama[$x]['nama_witel'] ?></h2>
        <div class="mr-5"><?php echo $count[$x] ?> Pengajuan</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
        </a>
      </div>
      </div>
      
      <?php } ?>
    <?php else: ?>
      <div class="row">
      <?php foreach ($pengajuan as $p): ?>
      <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
        <h4 class="text-body font-weight-bold">Witel <?php echo $p->nama_witel ?></h2>
        <div class="mr-5"><?php echo $count?> Pengajuan</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
        </a>
      </div>
      </div>
      <?php break;?>
      <?php endforeach; ?>

    <?php endif ?>
    
    
    </div>    
    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("admin/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>

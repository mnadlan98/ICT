<!-- Bootstrap core CSS-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


<!-- Custom fonts FontAwesome-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

<!-- Datatables CSS-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>

<!-- SB-Admin CSS-->
<link href="<?php echo base_url('css/sb-admin.css') ?>" rel="stylesheet">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">


<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1 fa fa-wrench" href="<?php echo site_url('admin/Overview') ?>"> Admin Page</a>

   

    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        
    </form>

    <!-- Navbar -->

    <ul class="navbar-nav ml-auto ml-md-0">
     
        

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i> <?= $this->session->userdata("admin")['username'] ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo site_url()."login/logout"?>">Logout</a>
            </div>
        </li>
    </ul>
</nav>

<!DOCTYPE html>
<html lang="en">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800" rel="stylesheet">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
    <style type="text/css">
        .activated{
            background-color:white;
        }
        .activated span{
            color:black;
        }
    </style>
</head>

<body id="page-top">

    <?php $this->load->view("admin/_partials/navbar.php") ?>
    <div id="wrapper">

    <?php $this->load->view("admin/_partials/sidebar.php") ?>
        

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                
                
                <!-- DataTables -->
                <div class="card mb-3" >
                    <div class="card-body" >
                        <div class="table-responsive">
                        <div class="custom-file" method="POST" style="width:220px; float:right;">
                                <input type="file" class="custom-file-input" name="background_sertifikat" id="background_sertifikat" required>
                                <label class="custom-file-label" for="KTP">Ubah Sertifikat</label>
                            </div>
                            <table class="table table-hover" id="example" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Tanggal Tour</th>
                                        <th>Lokasi Tour</th>
                                        <th>Printout Sertifikat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0;?>
                                    <?php foreach ($peserta as $p):?>
                                    <tr>
                                        <td>
                                            <?php echo $i+=1; ?>
                                        </td>
                                        <td>
                                            <?php echo $p->nama_peserta ?>
                                        </td>
                                        <td>
                                            <?php echo $p->tanggal_tour ?>
                                        </td>
                                        <td>
                                            <?php echo $p->lokasi_tour ?>
                                        </td>
                                        <td>
                                        <form method="POST" action="<?php echo site_url()."laporan/printout"?>">
                                            <input type="hidden" name="id_peserta" value="<?php echo $p->id_peserta ?>">  
                                            <Input Type="Submit" Name="Create_pdf" Class="Btn Btn-Danger" Value="Cetak Sertifikat" />  
                                        </form> 
                    
                                        </td>
                                        
                                    </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
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
<script>
    $(document).ready(function() {
        $('#example1').DataTable( {
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
        } );
    } );

    $(document).ready(function() {
        $('#example2').DataTable( {
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
        } );
    } );


</script>

</html>

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- Page level plugin JavaScript-->

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
<script src="<?php echo base_url('js/dataTables.bootstrap4.js') ?>"></script>
<!-- Demo scripts for this page-->
<script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script> -->
<script>
    function deleteConfirm(url){
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }

    function addModal(url,plc,txt,name){
        $('#form1').attr('action', url);
        $('#input1').attr('placeholder', plc);
        $('#input1').attr('name', name);
        $('#txt1').text(txt);
        $('#modalAdd').modal();
    }

    function editModal(url,val,txt,name){
        $('#form').attr('action', url);
        $('#input').attr('value', val);
        $('#input').attr('name', name);
        $('#txt').text(txt);
        $('#modalEdit').modal();
    }

    function editAdmin(url,val,nama){
        $('#editAdmin').attr('action', url);
        $('#username').attr('value', val);
        $('#nama').attr('value', nama);
        $('#EditAdminWitel').modal();
    }

    function editAdminTreg(url,val,nama,unit){
        $('#editAdminTreg').attr('action', url);
        $('#username1').attr('value', val);
        $('#nama1').attr('value', nama);
        $('#unit').attr('value', unit);
        $('#EditAdminTreg').modal();
    }

    function ModalSTO(url,txt,sto,ket){
        $('#form2').attr('action', url);
        $('#txt2').text(txt);
        $('#sto').attr('value', sto);
        $('#keterangan').attr('value', ket);
        $('#witel').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('admin/Overview/get_datel');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_datel+'>'+data[i].datel+'</option>';
                        }
                        $('#datel').html(html);
                    }
                    
                });
                $.ajax({
                    url : "<?php echo site_url('admin/Overview/get_wilayah');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_wilayah+'>'+data[i].wilayah+'</option>';
                        }
                        $('#wilayah').html(html);
                    }
                    
                });
                return false;
        });
        $('#ModalSTO').modal();    
    }

    function ModalWilayah(url,txt,wilayah){
        $('#form3').attr('action', url);
        $('#txt3').text(txt);
        $('#wilayah1').attr('value', wilayah);
        $('#ModalWilayah').modal();
    }

    function ModalDatel(url,txt,datel){
        $('#form4').attr('action', url);
        $('#txt4').text(txt);
        $('#datel1').attr('value', datel);
        $('#ModalDatel').modal();
    }

    function ModalKontak(url,txt,namawitel,alamat,notelp,email_kontak){
        $('#form5').attr('action', url);
        $('#txt5').text(txt);
        $('#namawitel').attr('value', namawitel);
        $('#alamat').attr('value', alamat);
        $('#notelp').attr('value', notelp);
        $('#email_kontak').attr('value', email_kontak)
        $('#ModalKontak').modal();
    }
    
    function ModalGallery(url,txt,judul){
        $('#formgaleri').attr('action', url);
        $('#txtgaleri').text(txt);
        $('#judul').attr('value', judul);
        $('#ModalGallery').modal();
    }

    function ModalSekolah(url,txt,npsn,nama_sekolah,KabupatenKota){
        $('#formsekolah').attr('action', url);
        $('#txtsekolah').text(txt);
        $('#npsn').attr('value', npsn);
        $('#nama_sekolah').attr('value', nama_sekolah);
        $( "#KabupatenKota" ).autocomplete({
            source: "<?php echo site_url('Register/get_kotasekolah/?');?>"
        });
        $('#KabupatenKota').attr('value', KabupatenKota);
        $('#ModalSekolah').modal();
    }
	
    function ModalUser(url,nama_user,email_user,notelp_user,kota_sekolah,nama_sekolah,email_sekolah,notelp_sekolah){
        $('#editUser').attr('action', url);
        $('#nama_user').attr('value', nama_user);
        $('#email_user').attr('value', email_user);
        $('#notelp_user').attr('value', notelp_user);
        $( "#kota_sekolah" ).autocomplete({
            source: "<?php echo site_url('Register/get_kotasekolah/?');?>"
        });
        $('#kota_sekolah').attr('value', kota_sekolah);
        $( "#nama_sekolah" ).autocomplete({
            source: "<?php echo site_url('Register/get_namasekolah/?');?>"
        });
        $('#nama_sekolah').attr('value', nama_sekolah);
        $('#email_sekolah').attr('value', email_sekolah);
        $('#notelp_sekolah').attr('value', notelp_sekolah);
        $('#EditUser').modal();
    }
	
    function ModalConfigEmail(url,protocol,mailtype,smtp_host,smtp_port,smtp_timeout,smtp_user,smtp_pass){
        $('#configEmail').attr('action', url);
        $('#protocol').attr('value', protocol);
        $('#mailtype').attr('value', mailtype);
        $('#smtp_host').attr('value', smtp_host);
        $('#smtp_port').attr('value', smtp_port);
        $('#smtp_timeout').attr('value', smtp_timeout);
        $('#smtp_user').attr('value', smtp_user);
        $('#smtp_pass').attr('value', smtp_pass);
        $('#editConfigEmail').modal();
    }

</script>

<!-- <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'Data export'
            },
            {
                extend: 'pdfHtml5',
                title: 'Data export'
            }
        ]
    } );
} );
</script> -->

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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

    function editAdmin(url,val){
        $('#editAdmin').attr('action', url);
        $('#username').attr('value', val);
        $('#EditAdminWitel').modal();
    }
    function ModalSTO(url,txt,sto,ket){
        $('#form2').attr('action', url);
        $('#txt2').text(txt);
        $('#sto').attr('value', sto);
        $('#keterangan').attr('value', ket);
        $('#ModalSTO').modal();
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
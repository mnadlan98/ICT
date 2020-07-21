
<footer class="footer font-small " style="background-color: #434343; padding-top:4vh;"  >

      <div class="container" >

        <div class="row py-4 d-flex align-items-center" >


        </div>

      </div>

    <div class="container text-center text-md-left mt-5">

      <div class="row mt-3">

        <div class="col-md-3 col-lg-4 col-xl-3 mb-2">

          <form class="input-group">
            <input type="text" class="form-control form-control-sm bg-light" placeholder="Your email address" aria-label="Your email" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-sm btn-danger my-0" style="width: 100%;" type="button">Subscribe</button>
            </div>
          </form>
          <div class="col-md-15 py-5">
          <div class="mb-2 flex-center">

            <a class="fb-ic" style="color: white;">
              <i class="fab fa-facebook-f fa-lg white-text mr-md-6 mr-3 fa-2x"> </i>
            </a>
            <a class="tw-ic" style="color: white;">
              <i class="fab fa-twitter fa-lg white-text mr-md-6 mr-3 fa-2x"> </i>
            </a>
            <a class="ins-ic" style="color: white;">
              <i class="fab fa-instagram fa-lg white-text mr-md-6 mr-3 fa-2x"> </i>
            </a>
            <a class="tw-yt" style="color: white;">
              <i class="fab fa-youtube fa-lg white-text mr-md-6 mr-3 fa-2x"> </i>
            </a>


            
          </div>
        </div>

        </div>

        <div class="col-md-2 col-lg-2 col-xl-3 mx-auto mb-4">
        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-2">
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4" >
        </div>

      </div>

    </div>

  </footer>



  <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
  <script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
        crossorigin="anonymous"></script>
  <script type="text/javascript">
        $(document).ready(function(){
            $( "#nama_sekolah" ).autocomplete({
              source: "<?php echo site_url('Register/get_namasekolah/?');?>"
            });
        });
  </script>
  <script type="text/javascript">
        $(document).ready(function(){
            $( "#kota_sekolah" ).autocomplete({
              source: "<?php echo site_url('Register/get_kotasekolah/?');?>"
            });
        });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#wilayah').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('pengajuan/get_sto');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_sto+'>'+data[i].keterangan+'</option>';
                        }
                        $('#sto').html(html);
                    }
                });
                return false;
            }); 
            
    });
  </script>
    
</body>
</html>
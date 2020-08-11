<footer class="footer font-small " style="background-color: #434343; padding-top:12vh;"  >


    <div class="container">

      <div class="row">

        <div class="col">

          
          <div class="col-md-15 py-2">
          <div class="mb-2 flex-center">

            <a href="https://www.facebook.com/wifi.idjabar/" class="fb-ic" style="color: white;">
              <i class="fab fa-facebook-f fa-lg white-text mr-md-6 mr-3 fa-2x"> </i>
            </a>
            <a class="tw-ic" href="https://twitter.com/wifi_idjabar" style="color: white;">
              <i class="fab fa-twitter fa-lg white-text mr-md-6 mr-3 fa-2x"> </i>
            </a>
            <a class="ins-ic" href="https://instagram.com/wifiidjabar" style="color: white;">
              <i class="fab fa-instagram fa-lg white-text mr-md-6 mr-3 fa-2x"> </i>
            </a>
            <a class="tw-yt" href="https://www.youtube.com/channel/UCOsiIEgWrIYVRVtjMWwePfw" style="color: white;">
              <i class="fab fa-youtube fa-lg white-text mr-md-6 mr-3 fa-2x"> </i>
            </a>


            
          </div>
        </div>

        </div>
        

      </div>

    </div>
    <p style="color:white;">Copyright Wifi.id Jabar 2020<p>
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

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>



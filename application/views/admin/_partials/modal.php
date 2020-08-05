<!-- Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menghapus Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- Add Modal Form -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 id="txt1" class="modal-title w-100 font-weight-bold"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form1" action="#" method="post">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="prefix grey-text"></i>
          <input type="text" id="input1" name ="#" class="form-control validate" placeholder="#" required>
          
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-deep-orange">Submit</button>
      </div>
    </div>
      </form>
  </div>
</div>

<!-- Edit Modal Form -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 id="txt" class="modal-title w-100 font-weight-bold"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form" action="#" method="post">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="prefix grey-text"></i>
          <input type="text" id="input" name ="#" class="form-control validate" value="#" required>
          
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-deep-orange">Submit</button>
      </div>
    </div>
      </form>
  </div>
</div>  

<!-- Modal Edit Admin Witel Form-->
<div id="EditAdminWitel" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Edit Admin Witel</h1>
            </div>
            <div class="modal-body">
                <form id="editAdmin" action="#" method="POST">
                    <input type="text" name="level" value="2" hidden>
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="username" name="username" value="#" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="nama" name="nama" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="">Pilih Role..</option>
                            <option value="1">Viewer</option>
                            <option value="2">Editor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_witel">Witel</label>
                        <select class="form-control" id="id_witel" name="id_witel" required>
                            <option value="">Pilih Witel..</option>
                            <?php foreach ($list as $w ): ?>{
                              <option value="<?php echo $w->id_witel?>"><?php echo $w->nama_witel?></option>
                            }
                          <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>

                        </div>
                        <div>
                            <button type="" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Regis Admin Witel Form-->
<div id="RegisAdminWitel" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Daftar Admin Witel</h1>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/register') ?>" method="POST">
                    <input type="text" name="level" value="2" hidden>
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="nama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="">Pilih Role..</option>
                            <option value="1">Viewer</option>
                            <option value="2">Editor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_witel">Witel</label>
                        <select class="form-control" id="id_witel" name="id_witel" required>
                            <option value="">Pilih Witel..</option>
                            <?php foreach ($list as $w ): ?>{
                              <option value="<?php echo $w->id_witel?>"><?php echo $w->nama_witel?></option>
                            }
                          <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password" name="password_conf">
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Regis Admin T-Reg Form-->
<div id="RegisAdminTreg" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Daftar Admin T-Reg</h1>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/register') ?>" method="POST">
                    <input type="text" name="level" value="1" hidden>
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="nama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <select class="form-control" id="unit" name="unit" required>
                            <option value="">Pilih Unit..</option>
                            <?php foreach ($unit as $w ): ?>{
                              <option value="<?php echo $w->id_unit?>"><?php echo $w->nama_unit?></option>
                            }
                          <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password" name="password_conf">
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Edit Admin T-Reg Form-->
<div id="EditAdminTreg" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Edit Admin T-Reg</h1>
            </div>
            <div class="modal-body">
                <form id="editAdminTreg"action="" method="POST">
                    <input type="text" name="level" value="1" hidden>
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="username1" name="username" value="" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="nama1" name="nama" value="">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <select class="form-control" id="unit" name="unit" required>
                            <option value="">Pilih Unit..</option>
                            <?php foreach ($unit as $w ): ?>{
                              <option value="<?php echo $w->id_unit?>"><?php echo $w->nama_unit?></option>
                            }
                          <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Edit User Form-->
<div id="EditUser" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Edit User</h1>
            </div>
            <div class="modal-body">
                <form id="editUser"action="" method="POST">
                    <div class="form-group">
                        <label class="control-label">Nama User</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="nama_user" name="nama_user" value="" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email User</label>
                        <div>
                            <input type="email" class="form-control input-lg" id="email_user" name="email_user" value="">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label class="control-label">No Telp User</label>
                        <input type="text" class="form-control" id="notelp_user" name="notelp_user" value=""  >
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jenjang Sekolah</label>
                        <select class="form-control" id="jenjang_sekolah" name="jenjang_sekolah" required>
                          <option selected disabled hidden>Pilih Jenjang..</option>
                          <option value="SLB">SLB</option>
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMK">SMK</option>
                          <option value="SMA">SMA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Kota Sekolah</label>
                        <input type="text" class="form-control" id="kota_sekolah" name="kota_sekolah" value="" >
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama Sekolah</label>
                        <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah"  value="">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email Sekolah</label>
                        <input type="text" class="form-control" id="email_sekolah" name="email_sekolah"   value=""  >
                    </div>
                    <div class="form-group">
                        <label class="control-label">No Telp Sekolah</label>
                        <input type="text" class="form-control" id="notelp_sekolah" name="notelp_sekolah"  value=""  >
                    </div>
                    <div class="form-group">
                        <label class="control-label">Status Verifikasi Akun</label>
                        <select class="form-control" id="active" name="active" required>
                          <option selected disabled hidden>Pilih Status Verifikasi..</option>
                          <option value="0">Belum Verifikasi</option>
                          <option value="1">Sudah Verifikasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal STO Form-->
<div id="ModalSTO" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id="txt2"class="modal-title"></h1>
            </div>
            <div class="modal-body">
                <form id="form2"action="" method="POST">
                    <div class="form-group">
                        <label class="control-label">Kode STO</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="sto"name="sto" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama STO</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="keterangan" id="keterangan" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="witel">Witel</label>
                        <select class="form-control" id="witel" name="witel" required>
                            <option value="">Pilih Witel..</option>
                            <?php foreach ($list as $w ): ?>{
                              <option value="<?php echo $w->id_witel?>"><?php echo $w->nama_witel?></option>
                            }
                          <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="datel">Datel</label>
                        <select class="form-control" id="datel" name="datel" required>
                            <option value="">Pilih Datel..</option>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="wilayah">Wilayah</label>
                        <select class="form-control" id="wilayah" name="wilayah" required>
                            <option value="">Pilih Wilayah..</option>
                            
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Wilayah Form-->
<div id="ModalWilayah" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id="txt3"class="modal-title"></h1>
            </div>
            <div class="modal-body">
                <form id="form3"action="" method="POST">
                    <div class="form-group">
                        <label class="control-label">Nama Wilayah</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="wilayah1" name="wilayah1" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="witel">Witel</label>
                        <select class="form-control" id="witel" name="witel" required>
                            <option value="">Pilih Witel..</option>
                            <?php foreach ($list as $w ): ?>{
                              <option value="<?php echo $w->id_witel?>"><?php echo $w->nama_witel?></option>
                            }
                          <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Datel Form-->
<div id="ModalDatel" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id="txt4"class="modal-title"></h1>
            </div>
            <div class="modal-body">
                <form id="form4"action="" method="POST">
                    <div class="form-group">
                        <label class="control-label">Nama Datel</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="datel1" name="datel1" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="witel">Witel</label>
                        <select class="form-control" id="witel" name="witel" required>
                            <option value="">Pilih Witel..</option>
                            <?php foreach ($list as $w ): ?>{
                              <option value="<?php echo $w->id_witel?>"><?php echo $w->nama_witel?></option>
                            }
                          <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Kontak Form-->
<div id="ModalKontak" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id="txt5"class="modal-title"></h1>
            </div>
            <div class="modal-body">
                <form id="form5"action="" method="POST">
                    <div class="form-group">
                        <label class="control-label">Witel</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="namawitel" name="namawitel" value="" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alamat Witel</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="alamat" name="alamat" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">No Telepon</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="notelp" name="notelp" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email Witel</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="email_kontak" name="email_kontak" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Gallery-->
<div id="ModalGallery" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id ="txtgaleri" class="modal-title"></h1>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('','id="formgaleri"');?> 
                    <form method="post">
                    
                    <div class="form-group">
                        <label class="control-label">Nama Sekolah</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="judul" id="judul" value=""> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Foto (max 5 mb)</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto" id="foto" required>
                            <label class="custom-file-label" for="foto">Pilih foto (.jpeg/.jpg/.png)</label>
                                
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </div>
                    </form>
                <?php echo form_close();?> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Sekolah-->
<div id="ModalSekolah" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id ="txtsekolah" class="modal-title"></h1>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('','id="formsekolah"');?> 
                    <form method="post">
                    <div class="form-group">
                        <label class="control-label">NPSN</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="npsn" id="npsn" value=""> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama Sekolah</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="nama_sekolah" id="nama_sekolah" value=""> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="control-label">Jenjang Sekolah</label>
                        <select class="form-control" id="bp" name="bp" required>
                          <option value="">Pilih Jenjang Sekolah..</option>
                          <option value="SLB">SLB</option>
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMK">SMK</option>
                          <option value="SMA">SMA</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="control-label">Kota/Kabupaten</label>
                        <input type="text" class="form-control KabupatenKota" id="KabupatenKota" name="KabupatenKota" value="<?php echo set_value('KabupatenKota'); ?>"  >
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </div>
                    </form>
                <?php echo form_close();?> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Edit Config Email -->
<div id="editConfigEmail" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Edit Config Email</h1>
            </div>
            <div class="modal-body">
                <form id="configEmail"action="" method="POST">
                    <div class="form-group">
                        <label class="control-label">protocol</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="protocol" name="protocol" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">mailtype</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="mailtype" name="mailtype" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">smtp_host</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="smtp_host" name="smtp_host" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">smtp_port</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="smtp_port" name="smtp_port" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">smtp_timeout</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="smtp_timeout" name="smtp_timeout" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">smtp_user</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="smtp_user" name="smtp_user" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">smtp_pass</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="smtp_pass" name="smtp_pass" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
                        <label class="control-label">Keterangan STO</label>
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
                            <?php foreach ($datel as $w ): ?>{
                              <option value="<?php echo $w->id_datel?>"><?php echo $w->datel?></option>
                            }
                          <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="wilayah">Wilayah</label>
                        <select class="form-control" id="wilayah" name="wilayah" required>
                            <option value="">Pilih Wilayah..</option>
                            <?php foreach ($wilayah as $w ): ?>{
                              <option value="<?php echo $w->id_wilayah?>"><?php echo $w->wilayah?></option>
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

<!-- Modal Add Gallery-->
<div id="AddGallery" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Tambah Gallery</h1>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/overview/add_gallery') ?>" method="POST">
                    
                    <div class="form-group">
                        <label class="control-label">Nama Sekolah</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="judul">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto" id="foto" required>
                            <label class="custom-file-label" for="foto">Pilih foto...</label>
                                
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
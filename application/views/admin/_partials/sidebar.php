<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/Overview') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Overview</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>List Pengajuan</span>
        </a>
        <?php if ($this->session->userdata("admin")['level']==1): ?>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <?php foreach ($list as $p): ?>
                <a class="dropdown-item" href="<?php echo site_url('admin/overview/Witel/'.$p->id_witel) ?>">Witel <?php echo $p->nama_witel ?></a>
                <?php endforeach; ?>
            </div>
    </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                    <i class="fas fa-fw fa-users""></i>
                    <span>Users</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                
                    <a class="dropdown-item" href="<?php echo site_url('admin/Overview/admin_list') ?>">Admin</a>
                    <a class="dropdown-item" href="<?php echo site_url('admin/Overview/user_list') ?>">User Sekolah</a>
                
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                    <i class="fas fa-fw fa-boxes"></i>
                    <span>Parameter</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="<?php echo site_url('admin/Overview/witel_list') ?>">Witel</a>
                    <a class="dropdown-item" href="<?php echo site_url('admin/Overview/wilayah_list') ?>">Wilayah</a>
                    <a class="dropdown-item" href="<?php echo site_url('admin/Overview/datel_list') ?>">Datel</a>

                    <a class="dropdown-item" href="<?php echo site_url('admin/Overview/sto_list') ?>">STO</a>

                    <a class="dropdown-item" href="<?php echo site_url('admin/Overview/unit') ?>">Unit</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('admin/Overview/sekolah') ?>">
                <i class="fas fa-fw fa-university"></i>
                <span>Sekolah</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('admin/Overview/term') ?>">
                <i class="fas fa-fw fa-edit"></i>
                <span>Syarat & Ketentuan</span></a>
            </li>
            
        <?php else: ?>
            
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/overview/Witel/'.$this->session->userdata('admin')['id_witel']) ?>">Witel <?php echo $witel->nama_witel ?></a>
    </li>
            <?php if ($this->session->userdata("admin")['level']==2 && $this->session->userdata("admin")['role']==2): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                        <i class="fas fa-fw fa-users""></i>
                        <span>Konten Web</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    
                        <a class="dropdown-item" href="<?php echo site_url('admin/Overview/gallery') ?>">Galeri</a>
                        <a class="dropdown-item" href="<?php echo site_url('admin/Overview/kontak') ?>">Kontak</a>
                    
                    </div>
                </li>
            <?php endif ?>
        <?php endif ?>
        
</ul>

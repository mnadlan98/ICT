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
                <a class="dropdown-item" href="<?php echo site_url('admin/Pengajuan/Witel/1') ?>">Witel BANDUNG</a>
                <a class="dropdown-item" href="<?php echo site_url('admin/Pengajuan/Witel/2') ?>">Witel BANDUNG BARAT</a>
                <a class="dropdown-item" href="<?php echo site_url('admin/Pengajuan/Witel/3') ?>">Witel CIREBON</a>
                <a class="dropdown-item" href="<?php echo site_url('admin/Pengajuan/Witel/4') ?>">Witel KARAWANG</a>
                <a class="dropdown-item" href="<?php echo site_url('admin/Pengajuan/Witel/5') ?>">Witel SUKABUMI</a>
                <a class="dropdown-item" href="<?php echo site_url('admin/Pengajuan/Witel/6') ?>">Witel TASIKMALAYA</a>
            </div>
        </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Konten Web</span></a>
            </li>
        <?php else: ?>
            <?php foreach ($pengajuan as $p): ?>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?php echo site_url('admin/Pengajuan/Witel/4'.$p->id_witel) ?>">Witel <?php echo $p->nama_witel ?></a>
        </li>
            <?php break;?>
            <?php endforeach; ?>
        <?php endif ?>
        
</ul>

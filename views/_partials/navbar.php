<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SPK TOPSIS</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= $data == 'dashboard' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Master Data
    </div>

    <li class="nav-item <?= $data == 'kriteria' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('kriteria') ?>">
            <i class="fas fa-fw fa-columns"></i>
            <span>Data Kriteria</span>
        </a>
    </li>
    <li class="nav-item <?= $data == 'alternatif' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('alternatif') ?>">
            <i class="fas fa-fw fa-columns"></i>
            <span>Data Alternatif</span>
        </a>
    </li>
    <li class="nav-item <?= $data == 'poin' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('poin') ?>">
            <i class="fas fa-fw fa-columns"></i>
            <span>Data Poin</span>
        </a>
    </li>
    <li class="nav-item <?= $data == 'matrik' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('matrik') ?>">
            <i class="fas fa-fw fa-columns"></i>
            <span>Data Matrik</span>
        </a>
    </li>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Hasil Perhitungan
    </div>
    <li class="nav-item <?= $data == 'hasil' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('hasil') ?>">
            <i class="fas fa-fw fa-columns"></i>
            <span>Hasil Perhitungan</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
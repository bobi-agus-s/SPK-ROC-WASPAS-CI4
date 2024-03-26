<li class="sidebar-title">Menu</li>

<li
    class="sidebar-item <?= $page == "dashboard" ? 'active' : null; ?>">
    <a href="<?= site_url('/') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0"></span>
        <span>Dashboard</span>
    </a>
</li>

<li class="sidebar-title">Master Data</li>

<?php if (session('login_info')): ?>
<li
    class="sidebar-item <?= $page == "agama" ? 'active' : null; ?>">
    <a href="<?= site_url('agama') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0"></span>
        <span>Agama</span>
    </a>
</li>

<li
    class="sidebar-item <?= $page == "dusun" ? 'active' : null; ?>">
    <a href="<?= site_url('dusun') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0"></span>
        <span>Dusun</span>
    </a>
</li>
<?php endif ?>

<li
    class="sidebar-item <?= $page == "penduduk" ? 'active' : null; ?>">
    <a href="<?= site_url('penduduk') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0"></span>
        <span>Data Penduduk</span>
    </a>
</li>

<li class="sidebar-title">SPK</li>

<li
    class="sidebar-item <?= $page == "kriteria" ? 'active' : null; ?>">
    <a href="<?= site_url('kriteria') ?>" class='sidebar-link'>
            <span class="fa-fw select-all fas mx-0"></span>
        <span>Kriteria</span>
    </a>
</li>

<li
    class="sidebar-item <?= $page == "alternatif" ? 'active' : null; ?>">
    <a href="<?= site_url('alternatif') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0"></span>
        <span>Alternatif</span>
    </a>
</li>

<?php if (session('login_info')): ?>
<li
    class="sidebar-item <?= $page == "perhitungan" ? 'active' : null; ?>">
    <a href="<?= site_url('perhitungan') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0"></span>
        <span>Perhitungan</span>
    </a>
</li>
<?php endif ?>

<li
    class="sidebar-item <?= $page == "hasil" ? 'active' : null; ?>">
    <a href="<?= site_url('hasil') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0"></span>
        <span>Hasil Akhir</span>
    </a>
</li>

<li class="sidebar-title">Konfigurasi</li>

<li class="sidebar-item  has-sub">
    <a class="sidebar-link">
        <i class="bi bi-pen-fill"></i>
        <span>Periode (<?= session('periode'); ?>)</span>
    </a>
    <ul class="submenu" style="display: none;">
<?php if (session('login_info')): ?>
        <li
            class="submenu-item <?= $page == "periode" ? 'active' : null; ?>">
            <a href="<?= site_url('periode') ?>" class='sidebar-link'>
                <span class="fa-fw select-all fas mx-0"></span>
                <span>Kelola Periode</span>
            </a>
        </li>
<?php endif ?>
        <li
            class="submenu-item">
            <a href="<?= site_url('konfigurasi/set_periode') ?>" class='sidebar-link'>
                <span class="fa-fw select-all fas mx-0" style="transform: rotate(180deg);"></span>
                <span>Set Periode</span>
            </a>
        </li>
    </ul>
</li>



<li
    class="sidebar-item">
    <?php if (session('login_info')): ?>
    <a href="<?= site_url('auth/logout') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0" style="transform: rotate(180deg);"></span>
        <span>Logout</span>
    </a>
    <?php else: ?>
    <a href="<?= site_url('auth/login') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0" style="transform: rotate(180deg);"></span>
        <span>Login</span>
    </a>
    <?php endif ?>
</li>
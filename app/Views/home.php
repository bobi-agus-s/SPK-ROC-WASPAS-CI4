<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<h3><?= $title; ?></h3>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    
<section class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <a href="<?= site_url('penduduk') ?>" class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <span class="fa-fw select-all fas text-white"></span>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Data Penduduk</h6>
                                <div class="text-danger font-semibold"><?= count_data('penduduk') ?></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <a href="<?= site_url('kriteria') ?>" class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <span class="fa-fw select-all fas text-white"></span>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Kriteria (<?= session('periode'); ?>)</h6>
                                <div class="text-danger font-semibold"><?= count_data('kriteria', session('id_periode')) ?></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <a href="<?= site_url('alternatif') ?>" class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <span class="fa-fw select-all fas text-white"></span>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Alternatif (<?= session('periode'); ?>)</h6>
                                <div class="text-danger font-semibold"><?= count_data('alternatif', session('id_periode')) ?></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php if (session('login_info')): ?>
            <div class="col-6 col-lg-3 col-md-6">
                <a href="<?= site_url('penilaian') ?>" class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon green mb-2">
                                    <span class="fa-fw select-all fas text-white"></span>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Belum Penilaian</h6>
                                <div class="text-danger font-semibold"><?= cek_penilaian() ?></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif ?>
        </div>
    </div>
</section>

<section class="section">

    <div class="row">
        <div class="col-md-9">
            <div class="alert alert-light-success alert-dismissible show fade">
                <i class="bi bi-check-circle me-3"></i>
                    Rekomendasi Calon Penerima Bantuan Periode <?= session('periode'); ?> diurutkan Berdasarkan Ranking Teratas
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Grafik Perangkingan</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false" tabindex="-1">Semua</a>
                        </li>
                        <?php foreach ($dusun as $dt_dusun): ?>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="<?= $dt_dusun->nama_dusun; ?>-tab" data-bs-toggle="tab" href="#<?= $dt_dusun->nama_dusun; ?>" role="tab" aria-controls="<?= $dt_dusun->nama_dusun; ?>" aria-selected="false" tabindex="-1"><?= $dt_dusun->nama_dusun; ?></a>
                        </li>
                        <?php endforeach ?>
                        
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                           <section class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Semua</h4>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="bar"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <?php foreach ($dusun as $dt_dusun): ?>
                        <div class="tab-pane fade" id="<?= $dt_dusun->nama_dusun; ?>" role="tabpanel" aria-labelledby="<?= $dt_dusun->nama_dusun; ?>-tab">
                             <div class="card">
                                <div class="card-header">
                                    <h4>Grafik Perangkingan <?= $dt_dusun->nama_dusun; ?></h4>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Prasentase Warga Berdasarkan Dusun</h4>
                </div>
                <div class="card-body">
                    <div id="informasi-dusun"></div>
                </div>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection() ?>
<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<h3 class=""><?= $title; ?></h3>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="alert alert-light-warning alert-dismissible show fade">
    <i class="bi bi-check-circle me-3"></i>
        Rekomendasi Calon Penerima Bantuan Periode <?= session('periode'); ?> diurutkan Berdasarkan Ranking Teratas
</div>

<!-- Hasil Akhir Perankingan-->
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title "><span class="fa-fw select-all fas me-3"></span>Hasil Akhir Perankingan</h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th>Altenatif</th>
                                <th>Hasil (Q)</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($hasil as $key => $dt_hasil): ?>
                                <tr>
                                    <td><?= $dt_hasil->nama_penduduk; ?></td>
                                    <td><?= $dt_hasil->hasil; ?></td>
                                    <td><?= ++$key; ?></td>
                                </tr>
                                <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Grafik Perangkingan</h4>
            </div>
            <div class="card-body">
                <canvas id="bar"></canvas>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
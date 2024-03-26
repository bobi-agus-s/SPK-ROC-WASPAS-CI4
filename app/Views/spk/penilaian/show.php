<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<div class="d-flex align-items-center">
    <a href="<?= site_url('alternatif'); ?>">
        <span class="fa-fw select-all fas me-4 "></span>
    </a>
    <h3 class=""><?= $title; ?></h3>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="row">
    <!-- data penilaian -->
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span><span class="">Data Penilaian</span></h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <?php foreach ($kriteria as $dt_kriteria): ?>
                            <?php $subkriteria = $model_subkriteria->getDataByKriteria($dt_kriteria->id_kriteria) ?>
                            <tr>
                                <td width="25%"><?= $dt_kriteria->nama_kriteria; ?></td>
                                <td width="5%"><b>:</b></td>

                                <?php foreach ($subkriteria as $dt_subkriteria): ?>
                                <?php $dt_penilaian = $model_penilaian->getPenilaian($alternatif->id_alternatif, $dt_kriteria->id_kriteria) ?>
                                    <?php if ($dt_subkriteria->id_subkriteria == $dt_penilaian->id_subkriteria): ?>
                                    <td>
                                        <?= $dt_subkriteria->deskripsi; ?>
                                    </td>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- data alternatif -->
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span><span class="">Data Alternatif</span></h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="25%">No KK</td>
                            <td width="5%"><b>:</b></td>
                            <td><?= $alternatif->no_kk; ?></td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td><b>:</b></td>
                            <td><?= $alternatif->nik; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><b>:</b></td>
                            <td><?= $alternatif->nama_penduduk; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><b>:</b></td>
                            <td><?= $alternatif->jenis_kelamin; ?></td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td><b>:</b></td>
                            <td><?= $alternatif->tempat_lahir; ?>, <?= $alternatif->tgl_lahir; ?></td>
                        </tr>
                        <tr>
                            <td>Dusun</td>
                            <td><b>:</b></td>
                            <td>
                                <?php foreach ($dusun as $dt_dusun): ?>
                                    <?php if ($alternatif->id_dusun == $dt_dusun->id_dusun): ?>
                                        <?= $dt_dusun->nama_dusun ?>
                                        <?php break ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </td>
                        </tr>
                        <tr>
                            <td>RT</td>
                            <td><b>:</b></td>
                            <td>
                               <?= $alternatif->rt; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>RW</td>
                            <td><b>:</b></td>
                            <td>
                                <?= $alternatif->rw; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection() ?>
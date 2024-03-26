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
    <!-- input penilaian -->
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3"></span><span class="">Tambah Penilaian</span></h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">
                <form class="form form-vertical" action="<?= site_url('penilaian/save') ?>" method="post">
                    <input type="hidden" name="id_alternatif" value="<?= $alternatif->id_alternatif; ?>">
                    <div class="form-body">
                        <div class="row">

                            <?php foreach ($kriteria as $dt_kriteria): ?>
                                <input type="hidden" name="id_kriteria[]" value="<?= $dt_kriteria->id_kriteria; ?>">
                                <?php $subkriteria = $model_subkriteria->getDataByKriteria($dt_kriteria->id_kriteria) ?>

                                <div class="col-12">
                                    <h6><?= $dt_kriteria->nama_kriteria; ?></h6>
                                    <fieldset class="form-group">
                                        <select name="id_subkriteria[]" class="form-select" id="basicSelect">
                                            <?php foreach ($subkriteria as $dt_subkriteria): ?>
                                                <option value="<?= $dt_subkriteria->id_subkriteria; ?>"><?= $dt_subkriteria->deskripsi; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </fieldset>
                                </div>
                            <?php endforeach ?>

                            <div class="col-12 mt-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
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
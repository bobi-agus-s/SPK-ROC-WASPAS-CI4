<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<div class="d-flex">
    <a href="<?= site_url('penduduk'); ?>">
        <span class="fa-fw select-all fas me-4 "></span>
    </a>
    <h3 class=""><?= $title; ?></h3>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashData('success')): ?>
<div class="alert alert-light-success alert-dismissible show fade">
    <i class="bi bi-check-circle me-3"></i>
    <?= session()->getFlashData('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>

<?php if (session()->getFlashData('error')): ?>
<?php $error = session()->getFlashData('error') ?>
    <?php foreach ($error as $err): ?>
        <div class="alert alert-light-danger alert-dismissible show fade">
            <i class="bi bi-check-circle me-3"></i>
            Gagal menambah data
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php break ?>
    <?php endforeach ?>
<?php endif ?>

<section class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span><span class="">Edit data penduduk</span></h4>
                </div>
                <hr>
            </div>
             
            <div class="card-body">
                <form class="form form-vertical" action="<?= site_url('penduduk/update/') ?><?= $penduduk->id_penduduk; ?>" method="post">
                <?php $validation = \Config\Services::validation(); ?>
                    <div class="form-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group mandatory <?= isset($error['no_kk']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="no_kk" class="form-label">No KK</label>
                                    <input autocomplete="off" type="number"  class="form-control" name="no_kk" data-parsley-required="true" data-parsley-id="15" value="<?= $penduduk->no_kk; ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?= isset($error['no_kk']) ? $error['no_kk'] : null; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mandatory <?= isset($error['nik']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input autocomplete="off" type="number"  class="form-control" name="nik" data-parsley-required="true" data-parsley-id="15" value="<?= $penduduk->nik; ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?= isset($error['nik']) ? $error['nik'] : null; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mandatory <?= isset($error['nama_penduduk']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="nama_penduduk" class="form-label">nama</label>
                                    <input autocomplete="off" type="text"  class="form-control" name="nama_penduduk" data-parsley-required="true" data-parsley-id="15" value="<?= $penduduk->nama_penduduk; ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?= isset($error['nama_penduduk']) ? $error['nama_penduduk'] : null; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <h6>jenis kelamin</h6>
                                <fieldset class="form-group">
                                    <select name="jenis_kelamin" class="form-select" >
                                        <option value="L" <?= $penduduk->jenis_kelamin == 'L' ? 'selected' : null; ?>>Laki-laki</option>
                                        <option value="P" <?= $penduduk->jenis_kelamin == 'P' ? 'selected' : null; ?>>Perempuan</option>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-12">
                                <div class="form-group mandatory <?= isset($error['tempat_lahir']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="tempat_lahir" class="form-label">tempat lahir</label>
                                    <input autocomplete="off" type="text"  class="form-control" name="tempat_lahir" data-parsley-required="true" data-parsley-id="15" value="<?= $penduduk->tempat_lahir; ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?= isset($error['tempat_lahir']) ? $error['tempat_lahir'] : null; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mandatory <?= isset($error['tgl_lahir']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="tgl_lahir" class="form-label">tanggal lahir</label>
                                    <input autocomplete="off" type="date"  class="form-control" name="tgl_lahir" data-parsley-required="true" data-parsley-id="15" value="<?= $penduduk->tgl_lahir; ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?= isset($error['tgl_lahir']) ? $error['tgl_lahir'] : null; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <h6>agama</h6>
                                <fieldset class="form-group">
                                    <select name="id_agama" class="form-select" >
                                        <?php foreach ($agama as $dt_agama): ?>
                                            <option <?= $penduduk->id_agama == $dt_agama->id_agama ? 'selected' : null; ?> value="<?= $dt_agama->id_agama; ?>"><?= $dt_agama->nama_agama; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <h6>dusun</h6>
                                    <fieldset class="form-group">
                                        <select name="id_dusun" class="form-select" >
                                            <?php foreach ($dusun as $dt_dusun): ?>
                                                <option value="<?= $dt_dusun->id_dusun; ?>"><?= $dt_dusun->nama_dusun; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-3">
                                    <div class="form-group mandatory <?= isset($error['rt']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                        <label for="rt" class="form-label">rt</label>
                                        <input autocomplete="off" type="number"  class="form-control" name="rt" data-parsley-required="true" data-parsley-id="15" value="<?= $penduduk->rt; ?>">
                                        <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                            <span class="parsley-required"><?= isset($error['rt']) ? $error['rt'] : null; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group mandatory <?= isset($error['rw']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                        <label for="rw" class="form-label">rw</label>
                                        <input autocomplete="off" type="number"  class="form-control" name="rw" data-parsley-required="true" data-parsley-id="15" value="<?= $penduduk->rw; ?>">
                                        <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                            <span class="parsley-required"><?= isset($error['rw']) ? $error['rw'] : null; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="col-12 mt-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan Perubahan</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<?= $this->endSection() ?>
<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<div class="d-flex align-items-center">
    <a href="<?= site_url('kriteria'); ?>">
        <span class="fa-fw select-all fas me-4 "></span>
    </a>
    <h3 class=""><?= $title; ?></h3>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashData('error')): ?>
    <?php $error = session()->getFlashData('error') ?>

    <?php foreach ($error as $err): ?>
        <div class="alert alert-light-danger alert-dismissible show fade">
            <i class="bi bi-check-circle me-3"></i>
            Gagal mengubah data
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php break; ?>
    <?php endforeach ?>
<?php endif ?>

<section class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span><span class=""><?= $title; ?></span></h4>
                </div>
                <hr>
            </div>
             
            <div class="card-body">
                <form class="form form-vertical" action="<?= site_url('kriteria/update/') ?><?= $kriteria->id_kriteria; ?>" method="post">
                <?php $validation = \Config\Services::validation(); ?>
                    <input type="hidden" name="id_kriteria" value="<?= $kriteria->id_kriteria ?>">
                    <input type="hidden" name="id_periode" value="<?= $kriteria->id_periode ?>">
                    <div class="form-body">
                        <div class="row">
                            
                            <div class="col-12">
                                <div class="form-group mandatory <?= isset($error['nama_kriteria']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                                    <input type="text" id="nama_kriteria" class="form-control" name="nama_kriteria" data-parsley-required="true" data-parsley-id="15" value="<?= $kriteria->nama_kriteria; ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?= isset($error['nama_kriteria']) ? $error['nama_kriteria'] : null; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <h6>Jenis Kriteria</h6>
                                <fieldset class="form-group">
                                    <select name="jenis_kriteria" class="form-select" id="basicSelect">
                                        <option value="benefit" <?= $kriteria->jenis_kriteria == 'benefit' ? 'selected' : null ?>>benefit</option>
                                        <option value="cost" <?= $kriteria->jenis_kriteria == 'cost' ? 'selected' : null ?>>cost</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <div class="form-group mandatory <?= isset($error['prioritas']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="prioritas" class="form-label">Prioritas Kepentingan</label>
                                    <input type="text" id="prioritas" class="form-control" name="prioritas" data-parsley-required="true" data-parsley-id="15" value="<?= $kriteria->prioritas; ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?= isset($error['prioritas']) ? $error['prioritas'] : null; ?></span>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="col-12 mt-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection() ?>
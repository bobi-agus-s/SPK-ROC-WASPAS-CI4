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
                <form class="form form-vertical" action="<?= site_url('alternatif/update/') ?><?= $alternatif->id_alternatif; ?>" method="post">
                <?php $validation = \Config\Services::validation(); ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mandatory <?= isset($error['nama_alternatif']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
                                    <input type="text" id="nama_alternatif" class="form-control" name="nama_alternatif" data-parsley-required="true" data-parsley-id="15" value="<?= $alternatif->nama_alternatif; ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?= isset($error['nama_alternatif']) ? $error['nama_alternatif'] : null; ?></span>
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
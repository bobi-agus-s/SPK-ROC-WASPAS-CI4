<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<div>
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
    <!-- <div class="col-12 col-md-4 col-lg-4">

        <div class="card card_tambah_dusun border border-primary">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span><span class="">Tambah Dusun</span></h4>
                </div>
                <hr>
            </div>
             
            <div class="card-body">
                <form class="form form-vertical" action="<?//= site_url('dusun/create') ?>" method="post">
                <?//php $validation = \Config\Services::validation(); ?>
                    <div class="form-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group mandatory <?//= isset($error['dusun']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="nama_dusun" class="form-label">Dusun</label>
                                    <input autocomplete="off" type="text" id="nama_dusun" class="form-control" name="nama_dusun" data-parsley-required="true" data-parsley-id="15" value="<?//= old('nama_dusun'); ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?//= isset($error['nama_dusun']) ? $error['nama_dusun'] : null; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card card_edit_dusun d-none border border-warning">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span><span class="">Edit dusun</span></h4>
                </div>
                <hr>
            </div>
             
            <div class="card-body">
                <form id="form_edit_dusun" class="form form-vertical" action="<?//= site_url('dusun/update/') ?>" method="post">
                <?//php $validation = \Config\Services::validation(); ?>
                    <div class="form-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group mandatory <?//= isset($error['nama_dusun']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="input_edit_dusun" class="form-label">Dusun</label>
                                    <input autocomplete="off"  type="text" id="input_edit_dusun" class="form-control" name="nama_dusun" data-parsley-required="true" data-parsley-id="15" value="<?//= old('nama_dusun'); ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?//= isset($error['nama_dusun']) ? $error['nama_dusun'] : null; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-3 d-flex justify-content-end">
                                <button id="btn_edit_dusun" type="submit" class="d-none btn btn-primary ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan perubahan</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

    <div class="col-12 col-md-8 col-lg-8">
        <div class="card border">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3"></span><span class="">Data <?= $title; ?></span></h4>
                    <div>
                        <!-- <?//php if (count($dusun) > 0): ?>
                            <button class="btn btn_tambah_dusun btn-sm btn-outline-primary me-2 d-none">
                                <span class="fa-fw select-all fas me-2"></span>
                                Tambah data
                            </button>
                            <?//php if (user_login()->user_level == 'administrator'): ?>
                                <a href="<?//= site_url('dusun/truncate'); ?>" class="btn btn-hapus btn-sm btn-outline-danger">
                                    <span class="fa-fw select-all fas me-2"></span>
                                    Hapus Semua
                                </a>
                            <?//php endif ?>
                        <?//php endif ?> -->
                    </div>
                </div>
                <hr>
            </div>
            
            <div class="card-body">
                <div id="table1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table class="table table_dusun dataTable no-footer" id="table1" aria-describedby="table1_info">
                                <thead class="table-primary">
                                    <tr>
                                        <th width="7%">No</th>
                                        <th>Dusun</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dusun as $key => $dt_dusun): ?>
                                    <tr>
                                        <td><?= ++$key; ?></td>
                                        <td><?= $dt_dusun->nama_dusun; ?></td>
                                        <td>
                                            <button href="<?= site_url('dusun/edit/') ?><?= $dt_dusun->id_dusun; ?>" class="btn btn-sm btn-outline-warning btn-edit" data-id="<?= $dt_dusun->id_dusun; ?>">
                                                <span class="fa-fw select-all fas"></span>
                                            </button>
                                            <a href="<?= site_url('dusun/delete/'); ?><?= $dt_dusun->id_dusun; ?>" class="btn btn-sm btn-outline-danger btn-hapus">
                                                <span class="fa-fw select-all fas"></span>
                                            </a>
                                           
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?= $this->endSection() ?>
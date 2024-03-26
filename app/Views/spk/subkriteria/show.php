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

<?php if (session('login_info')): ?>
<div class="alert alert-light-warning alert-dismissible show fade">
    <i class="bi bi-check-circle me-3"></i>
        <strong>Penting !</strong> Jika menambah sub kriteria baru, lakukan penilaian ulang ke semua alternatif
</div>
<?php endif ?>

<section class="row">
    <div class="col-12 col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span><span class=""><?= $kriteria->nama_kriteria; ?></span></h4>
                    <?php if (session('login_info')): ?>
                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-tambah-<?= $kriteria->id_kriteria; ?>">
                        <span class="fa-fw select-all fas mr-3"></span>
                        Tambah Data
                    </button>
                    <?php endif ?>
                </div>
                <hr>
            </div>
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th width="5%">No</th>
                                <th>Sub Kriteria</th>
                                <th>Nilai</th>
                                <?php if (session('login_info')): ?>
                                <th width="10%">aksi</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($subkriteria as $key => $dt_subkriteria): ?>
                            <tr>
                                <td><?= ++$key; ?></td>
                                <td><?= $dt_subkriteria->deskripsi; ?></td>
                                <td><?= $dt_subkriteria->nilai; ?></td>
                                <?php if (session('login_info')): ?>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#modal-edit-<?= $dt_subkriteria->id_subkriteria; ?>" class="btn btn-sm btn-outline-warning">
                                        <span class="fa-fw select-all fas"></span>
                                    </button>
                                    <a href="<?= site_url('subkriteria/delete/'); ?><?= $dt_subkriteria->id_subkriteria; ?>" class="btn btn-sm btn-outline-danger btn-hapus"><span class="fa-fw select-all fas"></span></a>
                                </td>
                                <?php endif ?>
                            </tr>

                            <!-- modal edit -->
                            <div class="modal fade text-left" id="modal-edit-<?= $dt_subkriteria->id_subkriteria; ?>" tabindex="-1" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33"> 
                                                <span class="fa-fw select-all fas"></span>
                                                <span>
                                                    Edit Sub kriteria
                                                </span>
                                            </h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </button>
                                        </div>
                                        <form action="<?= site_url('subkriteria/update/'.$dt_subkriteria->id_subkriteria) ?>" method="post">
                                        <?php $validation = \Config\Services::validation(); ?>

                                            <input type="hidden" name="id_kriteria" value="<?= $kriteria->id_kriteria; ?>">
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group mandatory <?= isset($error['deskripsi']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                                            <label for="deskripsi" class="form-label">deskripsi</label>
                                                            <input type="text" id="deskripsi" class="form-control" name="deskripsi" data-parsley-required="true" data-parsley-id="15" value="<?= $dt_subkriteria->deskripsi; ?>">
                                                            <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                                                <span class="parsley-required"><?= isset($error['deskripsi']) ? $error['deskripsi'] : null; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group mandatory <?= isset($error['nilai']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                                            <label for="nilai" class="form-label">nilai</label>
                                                            <input type="number" id="nilai" class="form-control" name="nilai" data-parsley-required="true" data-parsley-id="15" value="<?= $dt_subkriteria->nilai; ?>">
                                                            <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                                                <span class="parsley-required"><?= isset($error['nilai']) ? $error['nilai'] : null; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Tutup</span>
                                                </button>

                                                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Ubah</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- modal tambah -->
<div class="modal fade text-left" id="modal-tambah-<?= $kriteria->id_kriteria; ?>" tabindex="-1" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33"> 
                    <span class="fa-fw select-all fas mr-3 "></span>
                    <span>
                        Tambah Sub kriteria <?= $kriteria->nama_kriteria; ?>
                    </span>
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="<?= site_url('subkriteria/create') ?>" method="post">
            <?php $validation = \Config\Services::validation(); ?>

                <input type="hidden" name="id_kriteria" value="<?= $kriteria->id_kriteria; ?>">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mandatory <?= isset($error['deskripsi']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                <label for="deskripsi" class="form-label">deskripsi</label>
                                <input type="text" id="deskripsi" class="form-control" name="deskripsi" data-parsley-required="true" data-parsley-id="15" value="<?= old('deskripsi'); ?>">
                                <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                    <span class="parsley-required"><?= isset($error['deskripsi']) ? $error['deskripsi'] : null; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mandatory <?= isset($error['nilai']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                <label for="nilai" class="form-label">nilai</label>
                                <input type="number" id="nilai" class="form-control" name="nilai" data-parsley-required="true" data-parsley-id="15" value="<?= old('nilai'); ?>">
                                <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                    <span class="parsley-required"><?= isset($error['nilai']) ? $error['nilai'] : null; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>

                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>
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
    <div class="col-12">
        <div class="card border">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3"></span><span class="">Data <?= $title; ?></span></h4>
                    <div>
                        <?php if (session('login_info')): ?>
                        <button class="btn btn_tambah_penduduk btn-sm btn-outline-primary me-5" data-bs-toggle="modal" data-bs-target="#modal-tambah">
                            <span class="fa-fw select-all fas me-2"></span>
                            Tambah data
                        </button>
                        <?php endif ?>

                        <a href="<?= site_url('penduduk'); ?>" class="btn btn-sm btn-outline-secondary me-2">
                            <span class="fa-fw select-all fas me-2"></span>
                            Refresh
                        </a>
                        <button class="btn btn_tambah_penduduk btn-sm btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#modal-filter">
                            <span class="fa-fw select-all fas me-2"></span>
                            Filter
                        </button>
                        <!-- <?//php if (session('login_info')): ?>
                        <a href="<?//= site_url('penduduk/cetak'); ?>" class="btn  btn-sm btn-outline-warning">
                            <span class="fa-fw select-all fas me-2"></span>
                            Cetak
                        </a>
                        <?//php endif ?> -->
                        <?php if (session('login_info')): ?>
                        <a href="<?= site_url('penduduk/export'); ?>" class="btn  btn-sm btn-outline-info">
                            <span class="fa-fw select-all fas me-2"></span>
                            Export Excel
                        </a>
                        <?php endif ?>
                    </div>
                </div>
                <hr>
            </div>
            
            <div class="card-body">
                <div id="table1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table class="table table_penduduk dataTable no-footer" id="table1" aria-describedby="table1_info">
                                <thead class="table-primary">
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>No KK</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Agama</th>
                                        <th>Dusun</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <?php if (session('login_info')): ?>
                                        <th width="7%">Aksi</th>
                                        <?php endif ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($penduduk as $key => $dt_penduduk): ?>
                                    <tr>
                                        <td><?= ++$key; ?></td>
                                        <td><?= $dt_penduduk->no_kk; ?></td>
                                        <td><?= $dt_penduduk->nik; ?></td>
                                        <td><?= $dt_penduduk->nama_penduduk; ?></td>
                                        <td><?= $dt_penduduk->jenis_kelamin; ?></td>
                                        <td><?= $dt_penduduk->tempat_lahir; ?></td>
                                        <td><?= tgl_indo($dt_penduduk->tgl_lahir); ?></td>
                                        <td><?= $dt_penduduk->nama_agama; ?></td>
                                        <td><?= $dt_penduduk->nama_dusun; ?></td>
                                        <td><?= $dt_penduduk->rt; ?></td>
                                        <td><?= $dt_penduduk->rw; ?></td>
                                        <?php if (session('login_info')): ?>                                        
                                        <td>
                                            <a href="<?= site_url('penduduk/edit/') ?><?= $dt_penduduk->id_penduduk; ?>" class="btn btn-sm btn-outline-warning " >
                                                <span class="fa-fw select-all fas"></span>
                                            </a>
                                            <a href="<?= site_url('penduduk/delete/'); ?><?= $dt_penduduk->id_penduduk; ?>" class="btn btn-sm btn-outline-danger btn-hapus">
                                                <span class="fa-fw select-all fas"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endif ?>
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

<!-- modal tambah -->
<!-- <div class="modal fade text-left" id="modal-tambah" tabindex="-1" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document"> -->

<div class="modal modal-lg fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> 
                    <span class="fa-fw select-all fas mr-3 "></span>
                    <span>
                        Tambah Data Penduduk
                    </span>
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="<?= site_url('penduduk/create') ?>" method="post">
            <?php $validation = \Config\Services::validation(); ?>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group mandatory <?= isset($error['no_kk']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                <label for="no_kk" class="form-label">No KK</label>
                                <input autocomplete="off" type="number"  class="form-control" name="no_kk" data-parsley-required="true" data-parsley-id="15" value="<?= old('no_kk'); ?>">
                                <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                    <span class="parsley-required"><?= isset($error['no_kk']) ? $error['no_kk'] : null; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mandatory <?= isset($error['nik']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                <label for="nik" class="form-label">NIK</label>
                                <input autocomplete="off" type="number"  class="form-control" name="nik" data-parsley-required="true" data-parsley-id="15" value="<?= old('nik'); ?>">
                                <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                    <span class="parsley-required"><?= isset($error['nik']) ? $error['nik'] : null; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mandatory <?= isset($error['nama_penduduk']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                <label for="nama_penduduk" class="form-label">nama</label>
                                <input autocomplete="off" type="text"  class="form-control" name="nama_penduduk" data-parsley-required="true" data-parsley-id="15" value="<?= old('nama_penduduk'); ?>">
                                <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                    <span class="parsley-required"><?= isset($error['nama_penduduk']) ? $error['nama_penduduk'] : null; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <h6>jenis kelamin</h6>
                            <fieldset class="form-group">
                                <select name="jenis_kelamin" class="form-select" >
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-12">
                            <div class="form-group mandatory <?= isset($error['tempat_lahir']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                <label for="tempat_lahir" class="form-label">tempat lahir</label>
                                <input autocomplete="off" type="text"  class="form-control" name="tempat_lahir" data-parsley-required="true" data-parsley-id="15" value="<?= old('tempat_lahir'); ?>">
                                <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                    <span class="parsley-required"><?= isset($error['tempat_lahir']) ? $error['tempat_lahir'] : null; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mandatory <?= isset($error['tgl_lahir']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                <label for="tgl_lahir" class="form-label">tanggal lahir</label>
                                <input autocomplete="off" type="date"  class="form-control" name="tgl_lahir" data-parsley-required="true" data-parsley-id="15" value="<?= old('tgl_lahir'); ?>">
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
                                        <option value="<?= $dt_agama->id_agama; ?>"><?= $dt_agama->nama_agama; ?></option>
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
                                        <input autocomplete="off" type="number"  class="form-control" name="rt" data-parsley-required="true" data-parsley-id="15" value="<?= old('rt'); ?>">
                                        <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                            <span class="parsley-required"><?= isset($error['rt']) ? $error['rt'] : null; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group mandatory <?= isset($error['rw']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                        <label for="rw" class="form-label">rw</label>
                                        <input autocomplete="off" type="number"  class="form-control" name="rw" data-parsley-required="true" data-parsley-id="15" value="<?= old('rw'); ?>">
                                        <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                            <span class="parsley-required"><?= isset($error['rw']) ? $error['rw'] : null; ?></span>
                                        </div>
                                    </div>
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

<!-- modal filter -->
<div class="modal fade text-left" id="modal-filter" tabindex="-1" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> 
                    <span class="fa-fw select-all fas mr-3 "></span>
                    <span>
                        Filter Data Penduduk
                    </span>
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="<?= site_url('penduduk/filter') ?>" method="post">
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12">
                            <h6>Jenis Kelamin</h6>
                            <fieldset class="form-group">
                                <select name="jenis_kelamin" class="form-select" >
                                    <option value="">-- pilih --</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-12">
                            <h6>Tempat Lahir</h6>
                            <fieldset class="form-group">
                                <select name="tempat_lahir" class="form-select" >
                                    <option value="">-- pilih --</option>
                                    <?php foreach ($tempat_lahir as $dt_tempat_lahir): ?>
                                        <option value="<?= $dt_tempat_lahir->tempat_lahir; ?>"><?= $dt_tempat_lahir->tempat_lahir; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-12">
                            <h6>agama</h6>
                            <fieldset class="form-group">
                                <select name="id_agama" class="form-select" >
                                    <option value="">-- pilih --</option>
                                    <?php foreach ($agama as $dt_agama): ?>
                                        <option value="<?= $dt_agama->id_agama; ?>"><?= $dt_agama->nama_agama; ?></option>
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
                                            <option value="">-- pilih --</option>
                                            <?php foreach ($dusun as $dt_dusun): ?>
                                                <option value="<?= $dt_dusun->id_dusun; ?>"><?= $dt_dusun->nama_dusun; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-3">
                                    <div class="form-group mandatory <?= isset($error['rt']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                        <label for="rt" class="form-label">rt</label>
                                        <input autocomplete="off" type="number"  class="form-control" name="rt" data-parsley-required="true" data-parsley-id="15" value="<?= old('rt'); ?>">
                                        <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                            <span class="parsley-required"><?= isset($error['rt']) ? $error['rt'] : null; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group mandatory <?= isset($error['rw']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                        <label for="rw" class="form-label">rw</label>
                                        <input autocomplete="off" type="number"  class="form-control" name="rw" data-parsley-required="true" data-parsley-id="15" value="<?= old('rw'); ?>">
                                        <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                            <span class="parsley-required"><?= isset($error['rw']) ? $error['rw'] : null; ?></span>
                                        </div>
                                    </div>
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
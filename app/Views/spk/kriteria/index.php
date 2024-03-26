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

<?php if (session('login_info')): ?>
<!-- <div class="alert alert-light-warning alert-dismissible show fade">
    <i class="bi bi-check-circle me-3"></i>
        Untuk memastikan bobot sudah tergenerate dengan benar, bila melakukan tambah, edit dan hapus data, maka silakan melakukan <b>Generate Bobot</b> untuk mengupdate nilai bobot kriteria
    </div> -->

    <div class="alert alert-light-warning alert-dismissible show fade">
        <i class="bi bi-check-circle me-3"></i>
        <strong>Penting !</strong> Jika menambah Kriteria baru, wajib menambahkan sub kriteria nya juga dan lakukan penilaian ulang ke semua alternatif
    </div>
<?php endif ?>

<section class="row">
    <?php if (session('login_info')): ?>
        <div class="col-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span><span class="">Tambah Kriteria</span></h4>
                        <span class="badge rounded-pill bg-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Panduan</span>
                    </div>
                    <hr>
                </div>

                <div class="card-body">
                    <form class="form form-vertical" action="<?= site_url('kriteria/create') ?>" method="post">
                        <?php $validation = \Config\Services::validation(); ?>
                        <div class="form-body">
                            <div class="row">                          

                                <div class="col-12">
                                    <div class="form-group mandatory <?= isset($error['nama_kriteria']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                        <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                                        <input type="text" id="nama_kriteria" class="form-control" name="nama_kriteria" data-parsley-required="true" data-parsley-id="15" value="<?= old('nama_kriteria'); ?>">
                                        <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                            <span class="parsley-required"><?= isset($error['nama_kriteria']) ? $error['nama_kriteria'] : null; ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <h6 >Jenis Kriteria</h6>
                                    <fieldset class="form-group">
                                        <select name="jenis_kriteria" class="form-select" id="basicSelect">
                                            <option value="benefit">benefit</option>
                                            <option value="cost">cost</option>
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mandatory <?= isset($error['prioritas']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                        <label for="kode_kriteria" class="form-label">Prioritas Kepentingan</label>
                                        <input type="number" id="prioritas" class="form-control" name="prioritas" data-parsley-required="true" data-parsley-id="15" value="<?= old('prioritas'); ?>">
                                        <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                            <span class="parsley-required"><?= isset($error['prioritas']) ? $error['prioritas'] : null; ?></span>
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
        </div>
    <?php endif ?>

    <div class="col-12 col-md-8 col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3"></span>
                        <span class="">Data <?= $title; ?> Periode
                            <?php foreach ($periode as $dt_periode): ?>
                                <?= session('id_periode') == $dt_periode->id_periode ? $dt_periode->periode:null; ?>
                            <?php endforeach ?>
                        </span>
                    </h4>
                    <div>
                        <?php if (count($kriteria) > 0): ?>
                            <?php if (session('login_info')): ?>
                                <a href="<?= site_url('kriteria/generate/'.session('id_periode')); ?>" class="btn btn-sm btn-outline-primary me-3">
                                    <span class="fa-fw select-all fas me-2"></span>
                                    Generate Bobot
                                </a>
                                <a href="<?= site_url('kriteria/cetak') ?>" class="btn btn-sm btn-outline-success me-3">
                                    <span class="fa-fw select-all fas me-2"></span>
                                    Cetak Kriteria
                                </a>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                </div>
                <hr>
            </div>
            
            <div class="card-body">
                <div id="table1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table class="table dataTable no-footer" id="table1" aria-describedby="table1_info">
                                <thead class="table-primary">
                                    <tr>
                                        <th width="7%">Kode Kriteria</th>
                                        <th width="20%">Nama Kriteria</th>
                                        <th width="15%">Jenis Kriteria</th>
                                        <th width="5%">Prioritas</th>
                                        <th width="10%">Bobot</th>
                                        <th width="15%">Sub Kriteria</th>
                                        <?php if (session('login_info')): ?>
                                            <th width="10%">Aksi</th>
                                        <?php endif ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $bobot_total = 0; ?>

                                    <?php foreach ($kriteria as $key => $dt_kriteria): ?>
                                        <tr>
                                            <td><?= $dt_kriteria->kode_kriteria; ?></td>
                                            <td><?= $dt_kriteria->nama_kriteria; ?></td>
                                            <td>
                                                <span class="badge bg-<?= $dt_kriteria->jenis_kriteria == 'benefit' ? 'success' : 'warning' ?>"><?= $dt_kriteria->jenis_kriteria; ?></span>
                                            </td>
                                            <td><?= $dt_kriteria->prioritas; ?></td>
                                            <td><?= $dt_kriteria->bobot; ?></td>
                                            <td>
                                                <a href="<?= site_url('subkriteria/show/') ?><?= $dt_kriteria->id_kriteria; ?>" class="btn btn-sm btn-outline-success" data-bs-toggle="tooltip">
                                                    <span class="fa-fw select-all fas"></span>
                                                </a>
                                            </td>
                                            <?php if (session('login_info')): ?>
                                                <td>
                                                    <a href="<?= site_url('kriteria/edit/') ?><?= $dt_kriteria->id_kriteria; ?>" class="btn btn-sm btn-outline-warning">
                                                        <span class="fa-fw select-all fas"></span>
                                                    </a>

                                                    <a href="<?= site_url('kriteria/delete/') ?><?= $dt_kriteria->id_kriteria; ?>/<?= session('id_periode'); ?>" class="btn btn-sm btn-outline-danger btn-hapus"><span class="fa-fw select-all fas"></span></a>

                                                </td>
                                            <?php endif ?>
                                        </tr>
                                        <?php $bobot_total += $dt_kriteria->bobot; ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div>
                    Total Bobot : <span class=""><?= $bobot_total; ?></span>
                </div>
            </div>

        </div>
    </div>
</section>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Panduan Kriteria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <table class="table">
          <tbody>
            <tr>
              <tr>
                  <td>Nama Kriteria</td>
                  <td>:</td>
                  <td>Deskripsi dari kriteria</td>
              </tr>
              <tr>
                  <td>Jenis Kriteria</td>
                  <td>:</td>
                  <td>Cost (mengutamakan nilai terendah)</td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td>Benefit (mengutamakan nilai tertinggi)</td>
              </tr>
              <tr>
                  <td>Prioritas Kepentingan</td>
                  <td>:</td>
                  <td>Prioritas kriteria yang terpenting <strong>(Prioritas angka tidak boleh sama)</strong></td>
              </tr>
          </tbody>
        </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
</div>
</div>
</div>
</div>

<?= $this->endSection() ?>
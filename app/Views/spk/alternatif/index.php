<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<h3 class=""><?= $title; ?></h3>
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
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3"></span><span class="">Data <?= $title; ?> periode <?= session('periode') ?></span></h4>
                    <?php if (session('login_info')): ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah Data
                    </button>
                    <?php endif ?>
                </div>
                <hr>
            </div>
            
            <div class="card-body">
                <div id="table1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table dataTable no-footer" id="table1" aria-describedby="table1_info">
                                <thead class="table-primary">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>NIK</th>
                                        <th>Nama Penduduk</th>
                                        <th>Penilaian</th>
                                        <?php if (session('login_info')): ?>
                                        <th>Aksi</th>
                                        <?php endif ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $bobot_total = 0; ?>

                                    <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                    <tr>
                                        <td><?= ++$key; ?></td>
                                        <td><?= $dt_alternatif->nik; ?></td>
                                        <td><?= $dt_alternatif->nama_penduduk; ?></td>
                                         <td>
                                            <?php if (session('login_info')): ?>
                                                <?php if ($dt_alternatif->status_penilaian == 1): ?>
                                                    <a href="<?= site_url('penilaian/edit/') ?><?= $dt_alternatif->id_alternatif; ?>" class="btn btn-sm btn-outline-warning">
                                                        <span class="fa-fw select-all fas"></span> Ubah Penilaian
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?= site_url('penilaian/') ?><?= $dt_alternatif->id_alternatif; ?>" class="btn btn-sm btn-outline-info">
                                                        <span class="fa-fw select-all fas"></span> Input Penilaian
                                                    </a>
                                                <?php endif ?>
                                            <?php elseif (!session('login_info')): ?>
                                                <?php if ($dt_alternatif->status_penilaian == 1): ?>
                                                <a href="<?= site_url('penilaian/show/') ?><?= $dt_alternatif->id_alternatif; ?>" class="btn btn-sm btn-outline-success">
                                                        <span class="fa-fw select-all fas"></span> Lihat penilaian
                                                </a>
                                                <?php elseif ($dt_alternatif->status_penilaian == 0): ?>
                                                    <span class="badge bg-warning">belum ada penilaian</span>
                                                <?php endif ?>
                                            <?php endif ?>
                                            
                                        </td>
                                        <?php if (session('login_info')): ?>
                                        <td>
                                            <a href="<?= site_url('alternatif/delete/') ?><?= $dt_alternatif->id_alternatif; ?>/<?= $dt_alternatif->id_penduduk; ?>/<?= session('id_periode') ?>" class="btn btn-sm btn-outline-danger btn-hapus">batal ajukan</a>
                                        </td>
                                        <?php endif ?>
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

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pengajuan Penduduk Periode <?= session('periode') ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
                <div id="table1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table class="table table_penduduk dataTable no-footer" id="tabel2" aria-describedby="table1_info">
                                <thead class="table-primary">
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
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
                                        <td><?= $dt_penduduk->nik; ?></td>
                                        <td><?= $dt_penduduk->nama_penduduk; ?></td>
                                        <td><?= $dt_penduduk->nama_dusun; ?></td>
                                        <td><?= $dt_penduduk->rt; ?></td>
                                        <td><?= $dt_penduduk->rw; ?></td>
                                        <?php if (session('login_info')): ?>
                                        <td>
                                            <form action="<?= site_url('alternatif/ajukan/') ?>" method="post">
                                                <input type="hidden" name="id_penduduk" value="<?= $dt_penduduk->id_penduduk; ?>">
                                                <input type="hidden" name="id_periode" value="<?= session('id_periode') ?>">
                                                <input type="hidden" name="id_relasi" value="<?= $dt_penduduk->id_relasi; ?>">
                                                <button class="btn btn-sm btn-primary">
                                                    ajukan
                                                </button>
                                            </form>
                                        </td>
                                        <?php endif ?>
                                    </tr>
                                    
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
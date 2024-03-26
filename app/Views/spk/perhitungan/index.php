<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<h3 class=""><?= $title; ?> periode <?= session('periode') ?></h3>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="accordion mb-5" id="accordionExample">

<!-- Matrix keputusan -->
  <div class="accordion-item text-secondary">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tabel_penilaian" aria-expanded="true" aria-controls="tabel_penilaian">
        <div class="d-flex align-items-center justify-content-between">
            <h6 class="card-title ">
                <span class="fa-fw select-all fas me-3"></span>
                Rating Kecocokan Alternatif
            </h6>
        </div>
      </button>
    </h2>
    <div id="tabel_penilaian" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-column">
                            <div class="card-title">Rating Kecocokan Alternatif</div>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-primary">
                                    <tr>
                                        <th width="5%">Alternatif</th>
                                        <th>Nama</th>
                                        <?php foreach ($kriteria as $dt_kriteria): ?>
                                            <th>
                                                <?= $dt_kriteria->nama_kriteria; ?> (<?= $dt_kriteria->kode_kriteria; ?>)
                                            </th>
                                        <?php endforeach ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                    <?php if ($model_penilaian->cekObject($dt_alternatif->id_alternatif)): ?>
                                        
                                        <tr class="border-top-0">
                                            <td>A<?= ++$key; ?></td>
                                            <td><?= $dt_alternatif->nama_penduduk; ?></td>
                                            <?php foreach ($kriteria as $dt_kriteria): ?>
                                                <?php $tabel_penilaian = $model_perhitungan->tabel_penilaian($dt_alternatif->id_alternatif, $dt_kriteria->id_kriteria) ?>
                                                <td><?= $tabel_penilaian->deskripsi ?></td>
                                            <?php endforeach ?>
                                        </tr>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </section>
      </div>
    </div>
  </div>
<!-- akhir matrix keputusan -->


<!-- Matrix keputusan -->
  <div class="accordion-item text-secondary">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#matrix_keputusan" aria-expanded="true" aria-controls="matrix_keputusan">
        <div class="d-flex align-items-center justify-content-between">
            <h6 class="card-title ">
                <span class="fa-fw select-all fas me-3"></span>
                Matrix Keputusan (x)
            </h6>
        </div>
      </button>
    </h2>
    <div id="matrix_keputusan" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-column">
                            <div class="card-title">Matrix Keputusan (x)</div>
                            <div>
                                <!-- <img src="<?//= base_url('template/assets/images/matrix_keputusan.png') ?>" alt="" width="20%"> -->
                            </div>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-primary">
                                    <tr>
                                        <th width="5%">Alternatif</th>
                                        <th>Nama</th>
                                        <?php foreach ($kriteria as $dt_kriteria): ?>
                                            <th>
                                                <?= $dt_kriteria->kode_kriteria; ?>
                                            </th>
                                        <?php endforeach ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                    <?php if ($model_penilaian->cekObject($dt_alternatif->id_alternatif)): ?>
                                        
                                        <tr class="border-top-0">
                                            <td>A<?= ++$key; ?></td>
                                            <td><?= $dt_alternatif->nama_penduduk; ?></td>
                                            <?php foreach ($kriteria as $dt_kriteria): ?>
                                                <?php $matrix_keputusan = $model_perhitungan->matrix_keputusan($dt_alternatif->id_alternatif, $dt_kriteria->id_kriteria) ?>
                                                <td><?= $matrix_keputusan->nilai ?></td>
                                            <?php endforeach ?>
                                        </tr>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                    <tr class="table-danger">
                                        <td></td><td>Nilai Max</td>
                                        <?php foreach ($kriteria as $dt_kriteria): ?>
                                            <?php $max = $model_perhitungan->max($dt_kriteria->id_kriteria) ?>
                                            <td>
                                                <?= $max->nilai; ?>
                                            </td>
                                        <?php endforeach ?>
                                    </tr>
                                    <tr class="table-warning">
                                        <td></td><td>Nilai Min</td>
                                        <?php foreach ($kriteria as $dt_kriteria): ?>
                                            <?php $min = $model_perhitungan->min($dt_kriteria->id_kriteria) ?>
                                            <td>
                                                <?= $min->nilai; ?>
                                            </td>
                                        <?php endforeach ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </section>
      </div>
    </div>
  </div>
<!-- akhir matrix keputusan -->

<!-- bobot kriteria -->
  <div class="accordion-item text-secondary">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bobot_kriteria" aria-expanded="true" aria-controls="bobot_kriteria">
        <div class="d-flex align-items-center justify-content-between">
            <h6 class="card-title ">
                <span class="fa-fw select-all fas me-3"></span>
                Bobot Kriteria (w)
            </h6>
        </div>
      </button>
    </h2>
    <div id="bobot_kriteria" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="card-title">Bobot Kriteria (w)</div>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="">
                                    <tr>
                                        <th>Kriteria</th>
                                        <?php foreach ($kriteria as $dt_kriteria): ?>
                                            <th><?= $dt_kriteria->kode_kriteria; ?> (<?= $dt_kriteria->nama_kriteria; ?>)</th>
                                        <?php endforeach ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jenis Kritria</td>
                                        <?php foreach ($kriteria as $dt_kriteria): ?>
                                        <td>
                                            <?= $dt_kriteria->jenis_kriteria; ?>
                                        </td>
                                        <?php endforeach ?>
                                    </tr>
                                    <tr>
                                        <td>Bobot (w)</td>
                                        <?php foreach ($kriteria as $dt_kriteria): ?>
                                        <td>
                                            <?= $dt_kriteria->bobot; ?>
                                        </td>
                                        <?php endforeach ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div>
                            <?php $bobot_kriteria = $model_perhitungan->total_bobot() ?>
                            Total Bobot : <?= round($bobot_kriteria->bobot); ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
      </div>
    </div>
  </div>
<!-- akhir bobot kriteria -->

<!-- Normalisasi Matrix (Xij) -->
  <div class="accordion-item text-secondary">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#normalisasi_matrix" aria-expanded="true" aria-controls="normalisasi_matrix">
        <div class="d-flex align-items-center justify-content-between">
            <h6 class="card-title ">
                <span class="fa-fw select-all fas me-3"></span>
                Normalisasi Matrix (r)
            </h6>
        </div>
      </button>
    </h2>
    <div id="normalisasi_matrix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
            <section class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex flex-column">
                                <div class="card-title">Normalisasi Matrix (r)</div>
                                <div>
                                    <table class="table">
                                        <thead class="table-danger">
                                            <tr>
                                                <td>Benefit</td>
                                                <td>Cost</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="<?= base_url('template/assets/images/benefit.png') ?>" alt="" width="20%">
                                                </td>
                                                <td>
                                                    <img src="<?= base_url('template/assets/images/cost.png') ?>" alt="" width="20%">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-primary">
                                        <tr>
                                            <th width="5%">Alternatif</th>
                                            <th>Nama</th>
                                            <?php foreach ($kriteria as $dt_kriteria): ?>
                                                <th><?= $dt_kriteria->kode_kriteria; ?></th>
                                            <?php endforeach ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                        <?php if ($model_penilaian->cekObject($dt_alternatif->id_alternatif)): ?>
                                            <tr>
                                                <td>A<?= ++$key; ?></td>
                                                <td><?= $dt_alternatif->nama_penduduk; ?></td>
                                                <?php foreach ($kriteria as $dt_kriteria): ?>
                                                    <?php $bobot = $dt_kriteria->bobot ?>
                                                    <?php $matrix_keputusan = $model_perhitungan->matrix_keputusan($dt_alternatif->id_alternatif, $dt_kriteria->id_kriteria) ?>
                                                    <?php $max = $model_perhitungan->max($dt_kriteria->id_kriteria) ?>
                                                    <?php $min = $model_perhitungan->min($dt_kriteria->id_kriteria) ?>
                                                    <td>
                                                        <?= 
                                                            $dt_kriteria->jenis_kriteria == "benefit" ?  
                                                            $matrix_keputusan->nilai / $max->nilai : $min->nilai / $matrix_keputusan->nilai
                                                        ?>
                                                    </td>
                                                <?php endforeach ?>
                                            </tr>
                                        <?php endif ?>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
      </div>
    </div>
  </div>
<!-- akhir normalisasi matrix -->

<!-- Nilai Kepentingan Relatif (Q) -->
  <div class="accordion-item text-secondary">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#perhitungan_preferensi" aria-expanded="true" aria-controls="perhitungan_preferensi">
        <div class="d-flex align-items-center justify-content-between">
            <h6 class="card-title ">
                <span class="fa-fw select-all fas me-3"></span>
                Nilai Kepentingan Relatif (Q)
            </h6>
        </div>
      </button>
    </h2>
    <div id="perhitungan_preferensi" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-column">
                            <div class="card-title">Nilai Kepentingan Relatif (Q)</div>
                            <div>
                                <img src="<?= base_url('template/assets/images/rumus_preferensi.png') ?>" alt="" width="20%">
                            </div>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-primary">
                                    <tr>
                                        <th width="5%">Altenatif</th>
                                        <th>Nama</th>
                                        <th>WSM</th>
                                        <th>WPM</th>
                                        <th>Hasil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                    <?php if ($model_penilaian->cekObject($dt_alternatif->id_alternatif)): ?>
                                        
                                        <?php $subtotal_wsm = 0 ?>
                                        <?php $subtotal_wpm = 1 ?>
                                        <tr>
                                            <td>A<?= ++$key; ?></td>
                                            <td><?= $dt_alternatif->nama_penduduk; ?></td>
                                            <!--  
                                            <?php foreach ($kriteria as $dt_kriteria): ?>
                                                <?php $bobot = $dt_kriteria->bobot ?>
                                                <?php $matrix_keputusan = $model_perhitungan->matrix_keputusan($dt_alternatif->id_alternatif, $dt_kriteria->id_kriteria) ?>
                                                
                                                == inisialisasi variabel normalisasi 
                                                
                                                <?php $Xij = 0 ?>
                                                <?php $max = $model_perhitungan->max($dt_kriteria->id_kriteria) ?>
                                                <?php $min = $model_perhitungan->min($dt_kriteria->id_kriteria) ?>
                                            <td>
                                                <?php if ($dt_kriteria->jenis_kriteria == "benefit"): ?>
                                                    <?php $Xij = $matrix_keputusan->nilai / $max->nilai ?>
                                                <?php else: ?>
                                                    <?php $Xij = $min->nilai / $matrix_keputusan->nilai ?>
                                                <?php endif ?>
                                                
                                                == WSM
                                                <?php $wsm = $Xij * $bobot; ?>

                                                == WPM
                                                <?php $wpm = pow($Xij, $bobot); ?>

                                                == output
                                                <?php $wsm; ?> | <?= $wpm; ?>

                                                == WSM
                                                <?php $subtotal_wsm += $wsm ?>
                                                == WPM
                                                <?php $subtotal_wpm *= $wpm ?>
                                            </td>
                                            <?php endforeach ?>
                                            -->

                                            <td>
                                                <?= 0.5 * $subtotal_wsm; ?>
                                            </td>
                                            <td>
                                                <?= 0.5 * $subtotal_wpm; ?>
                                            </td>
                                            <td>
                                                <?= 0.5*$subtotal_wsm + 0.5*$subtotal_wpm ?>
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
        </section>
      </div>
    </div>
  </div>
<!-- akhir perhitungan preferensi -->

<!-- Hasil akhir perangkingan -->
  <div class="accordion-item text-secondary">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#perangkingan" aria-expanded="true" aria-controls="perangkingan">
        <div class="d-flex align-items-center justify-content-between">
            <h6 class="card-title ">
                <span class="fa-fw select-all fas me-3"></span>
                Hasil akhir perangkingan
            </h6>
        </div>
      </button>
    </h2>
    <div id="perangkingan" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="card-title">Hasil akhir perangkingan</div>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Altenatif</th>
                                        <th>Hasil (Q)</th>
                                        <th>Ranking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php foreach ($hasil as $key => $dt_hasil): ?>
                                        <tr>
                                            <td><?= $dt_hasil->nama_penduduk; ?></td>
                                            <td><?= $dt_hasil->hasil; ?></td>
                                            <td><?= ++$key; ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </section>
      </div>
    </div>
  </div>
<!-- akhir hasil akhir perangkingan -->

</div>

<?= $this->endSection() ?>
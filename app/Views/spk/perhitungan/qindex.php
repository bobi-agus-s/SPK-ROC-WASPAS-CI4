<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<h3 class=""><?= $title; ?></h3>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- matrik keputusan -->
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title "><span class="fa-fw select-all fas me-3"></span>Matrix Keputusan (x)</h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th width="5%">No</th>
                                <th>Alternatif</th>
                                <?php foreach ($kriteria as $dt_kriteria): ?>
                                    <th>
                                        <?= $dt_kriteria->kode_kriteria; ?>
                                    </th>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                <tr class="border-top-0">
                                    <td><?= ++$key; ?></td>
                                    <td><?= $dt_alternatif->nama_alternatif; ?></td>
                                    <?php foreach ($kriteria as $dt_kriteria): ?>
                                        <?php $matrix_keputusan = $model_perhitungan->matrix_keputusan($dt_alternatif->id_alternatif, $dt_kriteria->id_kriteria) ?>
                                        <td><?= $matrix_keputusan->nilai ?></td>
                                    <?php endforeach ?>
                                </tr>
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

<!-- bobot kriteria -->
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title "><span class="fa-fw select-all fas me-3"></span>Bobot Kriteria (w)</h4>
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
                                    <?= $dt_kriteria->bobot; ?> %
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
                    Total Bobot : <?= $bobot_kriteria->bobot; ?> %
                </div>
            </div>

        </div>
    </div>
</section>

<!-- normalisasi matrix -->
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title "><span class="fa-fw select-all fas me-3"></span>Normalisasi Matrix Keputusan (r)</h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th width="5%">No</th>
                                <th>Altenatif</th>
                                <?php foreach ($kriteria as $dt_kriteria): ?>
                                    <th><?= $dt_kriteria->kode_kriteria; ?></th>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                <tr>
                                    <td><?= ++$key; ?></td>
                                    <td><?= $dt_alternatif->nama_alternatif; ?></td>
                                    <?php foreach ($kriteria as $dt_kriteria): ?>
                                    <?php $matrix_keputusan = $model_perhitungan->matrix_keputusan($dt_alternatif->id_alternatif, $dt_kriteria->id_kriteria) ?>
                                    <?php $jenis = $dt_kriteria->jenis_kriteria ?>

                                    <?php if ($jenis == 'benefit'): ?>
                                        <?php $max = $model_perhitungan->max($dt_kriteria->id_kriteria) ?>
                                    <?php else : ?>
                                        <?php $min = $model_perhitungan->min($dt_kriteria->id_kriteria) ?>
                                    <?php endif ?>

                                    <td>
                                        <?= $jenis == "benefit" ? $matrix_keputusan->nilai / $max->nilai : $min->nilai / $matrix_keputusan->nilai ?>
                                    </td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Perhitungan Preferensi (Q) -->
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title "><span class="fa-fw select-all fas me-3"></span>Perhitungan Preferensi (Q)</h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th width="5%">No</th>
                                <th>Altenatif</th>
                                <?php foreach ($kriteria as $dt_kriteria): ?>
                                    <th><?= $dt_kriteria->kode_kriteria; ?></th>
                                <?php endforeach ?>
                                <th>WSM</th>
                                <th>WPM</th>
                                <th>Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                <?php $subtotal_wsm = 0 ?>
                                <?php $subtotal_wpm = 1 ?>
                                <tr>
                                    <td><?= ++$key; ?></td>
                                    <td><?= $dt_alternatif->nama_alternatif; ?></td>

                                    <?php foreach ($kriteria as $dt_kriteria): ?>
                                        <?php $bobot = $dt_kriteria->bobot ?>
                                        <?php $matrix_keputusan = $model_perhitungan->matrix_keputusan($dt_alternatif->id_alternatif, $dt_kriteria->id_kriteria) ?>
                                        <!-- inisialisasi variabel normalisasi -->
                                        <?php $Xij = 0 ?>
                                        <?php $max = $model_perhitungan->max($dt_kriteria->id_kriteria) ?>
                                        <?php $min = $model_perhitungan->min($dt_kriteria->id_kriteria) ?>
                                    <td>
                                        <?php if ($dt_kriteria->jenis_kriteria == "benefit"): ?>
                                            <?php $Xij = $matrix_keputusan->nilai / $max->nilai ?>
                                        <?php else: ?>
                                            <?php $Xij = $min->nilai / $matrix_keputusan->nilai ?>
                                        <?php endif ?>
                                        
                                        <!-- WSM -->
                                        <?php $wsm = $Xij * $bobot; ?>

                                        <!-- WPM -->
                                        <?php $wpm = pow($Xij, $bobot); ?>

                                        <!-- output -->
                                        <?= $wsm; ?> | <?= $wpm; ?>

                                        <!-- WSM -->
                                        <?php $subtotal_wsm += $wsm ?>
                                        <!-- WPM -->
                                        <?php $subtotal_wpm *= $wpm ?>
                                    </td>
                                    <?php endforeach ?>

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
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Hasil Akhir Perankingan-->
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title "><span class="fa-fw select-all fas me-3"></span>Hasil Akhir Perankingan</h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th>Altenatif</th>
                                <th>Hasil (Yi)</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                                <!-- <?//php foreach ($hasil as $key => $dt_hasil): ?> -->
                                <tr>
                                    <td><?//= $dt_hasil->nama_alternatif; ?>a001</td>
                                    <td><?//= $dt_hasil->hasil; ?>10</td>
                                    <td><?//= ++$key; ?>1</td>
                                </tr>
                                <!-- <?//php endforeach ?> -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>



<div class="accordion" id="accordionExample">

  <!-- Matrix keputusan -->
  <div class="accordion-item text-secondary">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#matrix_keputusan" aria-expanded="true" aria-controls="matrix_keputusan">
        <div class="d-flex align-items-center justify-content-between">
            <h6 class="card-title ">
                <span class="fa-fw select-all fas me-3"></span>
                Matrix Keputusan (x)
            </h6>
        </div>
      </button>
    </h2>
    <div id="matrix_keputusan" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="card-title">Matrix Keputusan (x)</div>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-primary">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Alternatif</th>
                                        <?php foreach ($kriteria as $dt_kriteria): ?>
                                            <th>
                                                <?= $dt_kriteria->kode_kriteria; ?>
                                            </th>
                                        <?php endforeach ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                        <tr class="border-top-0">
                                            <td><?= ++$key; ?></td>
                                            <td><?= $dt_alternatif->nama_alternatif; ?></td>
                                            <?php foreach ($kriteria as $dt_kriteria): ?>
                                                <?php $matrix_keputusan = $model_perhitungan->matrix_keputusan($dt_alternatif->id_alternatif, $dt_kriteria->id_kriteria) ?>
                                                <td><?= $matrix_keputusan->nilai ?></td>
                                            <?php endforeach ?>
                                        </tr>
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

  <!-- bobot kriteria -->
  <div class="accordion-item text-secondary">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bobot_kriteria" aria-expanded="true" aria-controls="bobot_kriteria">
        <div class="d-flex align-items-center justify-content-between">
            <h6 class="card-title ">
                <span class="fa-fw select-all fas me-3"></span>
                Bobot Kriteria (w)
            </h6>
        </div>
      </button>
    </h2>
    <div id="bobot_kriteria" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
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
                                            <?= $dt_kriteria->bobot; ?> %
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
                            Total Bobot : <?= $bobot_kriteria->bobot; ?> %
                        </div>
                    </div>

                </div>
            </div>
        </section>
      </div>
    </div>
  </div>

  <!-- Normalisasi Matrix (Xij) -->
  <div class="accordion-item text-secondary">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#normalisasi_matrix" aria-expanded="true" aria-controls="normalisasi_matrix">
        <div class="d-flex align-items-center justify-content-between">
            <h6 class="card-title ">
                <span class="fa-fw select-all fas me-3"></span>
                Normalisasi Matrix (Xij)
            </h6>
        </div>
      </button>
    </h2>
    <div id="normalisasi_matrix" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
            <section class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="card-title">Normalisasi Matrix (Xij)</div>
                            </div>
                            <hr>
                        </div>
                        
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-primary">
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Altenatif</th>
                                            <?php foreach ($kriteria as $dt_kriteria): ?>
                                                <th><?= $dt_kriteria->kode_kriteria; ?></th>
                                            <?php endforeach ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                            <tr>
                                                <td><?= ++$key; ?></td>
                                                <td><?= $dt_alternatif->nama_alternatif; ?></td>
                                                <?php foreach ($kriteria as $dt_kriteria): ?>
                                                <?php $matrix_keputusan = $model_perhitungan->matrix_keputusan($dt_alternatif->id_alternatif, $dt_kriteria->id_kriteria) ?>
                                                <?php $jenis = $dt_kriteria->jenis_kriteria ?>

                                                <?php if ($jenis == 'benefit'): ?>
                                                    <?php $max = $model_perhitungan->max($dt_kriteria->id_kriteria) ?>
                                                <?php else : ?>
                                                    <?php $min = $model_perhitungan->min($dt_kriteria->id_kriteria) ?>
                                                <?php endif ?>

                                                <td>
                                                    <?= $jenis == "benefit" ? $matrix_keputusan->nilai / $max->nilai : $min->nilai / $matrix_keputusan->nilai ?>
                                                </td>
                                                <?php endforeach ?>
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

  <!-- Perhitungan Preferensi (Q) -->
  <div class="accordion-item text-secondary">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#matrix_keputusan" aria-expanded="true" aria-controls="matrix_keputusan">
        <div class="d-flex align-items-center justify-content-between">
            <h6 class="card-title ">
                <span class="fa-fw select-all fas me-3"></span>
                Perhitungan Preferensi (Q)
            </h6>
        </div>
      </button>
    </h2>
    <div id="matrix_keputusan" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="card-title">Perhitungan Preferensi (Q)</div>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-primary">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Altenatif</th>
                                        <?php foreach ($kriteria as $dt_kriteria): ?>
                                            <th><?= $dt_kriteria->kode_kriteria; ?></th>
                                        <?php endforeach ?>
                                        <th>WSM</th>
                                        <th>WPM</th>
                                        <th>Hasil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                        <?php $subtotal_wsm = 0 ?>
                                        <?php $subtotal_wpm = 1 ?>
                                        <tr>
                                            <td><?= ++$key; ?></td>
                                            <td><?= $dt_alternatif->nama_alternatif; ?></td>

                                            <?php foreach ($kriteria as $dt_kriteria): ?>
                                                <?php $bobot = $dt_kriteria->bobot ?>
                                                <?php $matrix_keputusan = $model_perhitungan->matrix_keputusan($dt_alternatif->id_alternatif, $dt_kriteria->id_kriteria) ?>
                                                <!-- inisialisasi variabel normalisasi -->
                                                <?php $Xij = 0 ?>
                                                <?php $max = $model_perhitungan->max($dt_kriteria->id_kriteria) ?>
                                                <?php $min = $model_perhitungan->min($dt_kriteria->id_kriteria) ?>
                                            <td>
                                                <?php if ($dt_kriteria->jenis_kriteria == "benefit"): ?>
                                                    <?php $Xij = $matrix_keputusan->nilai / $max->nilai ?>
                                                <?php else: ?>
                                                    <?php $Xij = $min->nilai / $matrix_keputusan->nilai ?>
                                                <?php endif ?>
                                                
                                                <!-- WSM -->
                                                <?php $wsm = $Xij * $bobot; ?>

                                                <!-- WPM -->
                                                <?php $wpm = pow($Xij, $bobot); ?>

                                                <!-- output -->
                                                <?= $wsm; ?> | <?= $wpm; ?>

                                                <!-- WSM -->
                                                <?php $subtotal_wsm += $wsm ?>
                                                <!-- WPM -->
                                                <?php $subtotal_wpm *= $wpm ?>
                                            </td>
                                            <?php endforeach ?>

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

</div>

<?= $this->endSection() ?>
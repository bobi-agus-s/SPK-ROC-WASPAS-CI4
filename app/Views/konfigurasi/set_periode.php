<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<div>
    <h3 class=""><?= $title; ?> (<?= session('periode') ?>)</h3> 
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

<div class=row>
    <div class="col">
        <form action="<?= site_url('konfigurasi') ?>/periode" method="post">
            <h6>Periode</h6>
            <div class="col-6">
                <fieldset class="d-inline form-group">
                    <select name="id_periode" class="form-select" id="basicSelect">
                        <?php foreach ($periode as $dt_periode): ?>
                            <option <?= $dt_periode->id_periode == session('id_periode')? 'selected':null; ?> value="<?= $dt_periode->id_periode; ?>"><?= $dt_periode->periode; ?></option>
                        <?php endforeach ?>
                    </select>
                </fieldset>
                <button type="submit" class=" btn btn-sm btn-primary">Pilih</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
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

<?php if (session()->getFlashData('err_user_found')): ?>
<div class="alert alert-light-danger alert-dismissible show fade">
    <i class="bi bi-check-circle me-3"></i>
    <?= session()->getFlashData('err_user_found') ?>
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
    <div class="col-12 col-md-4 col-lg-4">

        <div class="card card_tambah_user border border-primary">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span><span class="">Tambah User</span></h4>
                </div>
                <hr>
            </div>
             
            <div class="card-body">
                <form class="form form-vertical" action="<?= site_url('user/create') ?>" method="post">
                <?php $validation = \Config\Services::validation(); ?>
                    <div class="form-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group mandatory <?= isset($error['nama_user']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="nama_user" class="form-label">Nama user</label>
                                    <input autocomplete="off" type="text" id="nama_user" class="form-control" name="nama_user" data-parsley-required="true" data-parsley-id="15" value="<?= old('nama_user'); ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?= isset($error['nama_user']) ? $error['nama_user'] : null; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mandatory <?= isset($error['username']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="username" class="form-label">Username</label>
                                    <input autocomplete="off" type="text" id="username" class="form-control" name="username" data-parsley-required="true" data-parsley-id="15" value="<?= old('username'); ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?= isset($error['username']) ? $error['username'] : null; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mandatory <?= isset($error['password']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="password" class="form-label">Password</label>
                                    <input autocomplete="off" type="text" id="password" class="form-control" name="password" data-parsley-required="true" data-parsley-id="15" value="<?= old('password'); ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?= isset($error['password']) ? $error['password'] : null; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
	                            <h6>User Level</h6>
	                            <fieldset class="form-group">
	                                <select name="user_level" class="form-select" >
	                                    <option value="administrator">Administrator</option>
	                                    <option value="kasi_kesejahteraan">Kasi Kesejahteraan</option>
	                                    <option selected value="user">User</option>
	                                </select>
	                            </fieldset>
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

        <div class="card card_edit_user d-none border border-warning">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span><span class="">Edit User</span></h4>
                </div>
                <hr>
            </div>
             
            <div class="card-body">
                <form id="form_edit_user" class="form form-vertical" action="<?= site_url('user/update/') ?>" method="post">
                <input type="hidden" name="id_user" value="" id="input_edit_id_user">
                <?php $validation = \Config\Services::validation(); ?>
                    <div class="form-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group mandatory <?= isset($error['nama_user']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="input_edit_user" class="form-label">Nama user</label>
                                    <input autocomplete="off" type="text" id="input_edit_nama_user" class="form-control" name="nama_user" data-parsley-required="true" data-parsley-id="15" value="<?= old('nama_user'); ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?= isset($error['nama_user']) ? $error['nama_user'] : null; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mandatory <?= isset($error['username']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="input_edit_user" class="form-label">Username</label>
                                    <input autocomplete="off" type="text" id="input_edit_username" class="form-control" name="username" data-parsley-required="true" data-parsley-id="15" value="<?= old('username'); ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?= isset($error['username']) ? $error['username'] : null; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mandatory <?= isset($error['password']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                    <label for="input_edit_user" class="form-label">Password</label>
                                    <input autocomplete="off" type="text" id="input_edit_password" class="form-control" name="password" data-parsley-required="true" data-parsley-id="15" value="<?= old('password'); ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?= isset($error['password']) ? $error['password'] : null; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
	                            <h6>User Level</h6>
	                            <fieldset class="form-group">
	                                <select name="user_level" class="form-select" >
	                                    <option id="administrator" value="administrator">Administrator</option>
	                                    <option  id="kasi_kesejahteraan" value="kasi_kesejahteraan">Kasi Kesejahteraan</option>
	                                    <option id="user" value="user">User</option>
	                                </select>
	                            </fieldset>
	                        </div>

                            <div class="col-12 mt-3 d-flex justify-content-end">
                                <button id="btn_edit_user" type="submit" class="d-none btn btn-primary ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan perubahan</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-8 col-lg-8">
        <div class="card border">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3"></span><span class="">Data <?= $title; ?></span></h4>
                    <div>
                        <?php if (count($user) > 0): ?>
                            <button class="btn btn_tambah_user btn-sm btn-outline-primary me-2 d-none">
                                <span class="fa-fw select-all fas me-2"></span>
                                Tambah data
                            </button>
                        <?php endif ?>
                    </div>
                </div>
                <hr>
            </div>
            
            <div class="card-body">
                <div id="table1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table class="table table_user dataTable no-footer" id="table1" aria-describedby="table1_info">
                                <thead class="table-primary">
                                    <tr>
                                        <th width="7%">No</th>
                                        <th>Nama user</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>User Level</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user as $key => $dt_user): ?>
                                    <tr>
                                        <td><?= ++$key; ?></td>
                                        <td><?= $dt_user->nama_user; ?></td>
                                        <td><?= $dt_user->username; ?></td>
                                        <td><?= $dt_user->password; ?></td>
                                        <td>
                                        	<?php if ($dt_user->user_level == 'administrator'): ?>
                                        		<span class="badge bg-light-danger">Administrator</span>		
                                        	<?php elseif ($dt_user->user_level == 'kasi_kesejahteraan'): ?>
                                        		<span class="badge bg-light-success">Kasi Kesejahteraan</span>
                                        	<?php else: ?>		
                                        		<span class="badge bg-light-secondary">User</span>
                                        	<?php endif ?>
                                        </td>
                                        <td>
                                            <?php if ($dt_user->username != "admin"): ?>
                                                <button href="<?= site_url('user/edit/') ?><?= $dt_user->id_user; ?>" class="btn btn-sm btn-outline-warning btn-edit" data-id="<?= $dt_user->id_user; ?>">
                                                    <span class="fa-fw select-all fas"></span>
                                                </button>
                                                <a href="<?= site_url('user/delete/'); ?><?= $dt_user->id_user; ?>" class="btn btn-sm btn-outline-danger btn-hapus">
                                                    <span class="fa-fw select-all fas"></span>
                                                </a>
                                            <?php endif ?>
                                           
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
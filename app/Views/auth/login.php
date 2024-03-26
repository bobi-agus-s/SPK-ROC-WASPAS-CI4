<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SPK Bansos Desa Klepu</title>
    <link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="<?= base_url('') ?>/template/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('') ?>/template/assets/images/logo/favicon.png" type="image/png">

    <!-- font awsome -->
<link rel="stylesheet" href="<?= base_url() ?>/template/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css">

<!-- sweeralert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/extensions/sweetalert2/sweetalert2.min.css">

</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="<?= site_url('/'); ?>" class="d-flex align-items-center">
                    <span class="fa-fw select-all fas me-3" style="transform: rotate(-25deg); font-size: 3rem;"></span>
                    <span style="font-size: 2rem; font-weight: 700;" class="">SPK</span>
                </a>
            </div>
            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">Silakan masukan username dan passsword untuk masuk ke aplikasi</p>

            <form action="<?= site_url('auth/validate'); ?>" method="post">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input autocomplete="off" autofocus="on" name="username" type="text" class="form-control form-control-xl" placeholder="Username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input id="input_password" name="password" type="password" class="form-control form-control-xl" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="show_password">
                    <label class="form-check-label text-gray-600" for="show_password">
                        Tampilkan password
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Masuk</button>
            </form>
            <a href="<?= site_url('/') ?>" class="btn btn-secondary btn-block btn-lg shadow-lg mt-2">Halaman Utama</a>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

</div>

    <!-- datatable -->
    <script src="<?= base_url() ?>/template/assets/extensions/jquery/jquery.min.js"></script>
    <!-- sweetalert2 -->
    <script src="<?= base_url() ?>/template/assets/extensions/sweetalert2/sweetalert2.min.js"></script>

    <!-- my script -->
    <script type="text/javascript" src="<?= base_url() ?>/template/assets/js/script.js"></script>
    
    <?php if (session()->getFlashData('error')): ?>

    <script>
        Swal.fire({
          icon: 'error',
          title: 'Login gagal...',
          text: "<?= session()->getFlashData('error') ?>",
        })
    </script>
    
    <?php endif ?>

    <?php if (session()->getFlashData('err_akses_login')): ?>

    <script>
        Swal.fire({
          icon: 'warning',
          title: 'Akses login diperlukan',
          text: "<?= session()->getFlashData('err_akses_login') ?>",
        })
    </script>
    
    <?php endif ?>

</body>

</html>

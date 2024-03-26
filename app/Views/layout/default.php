<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SPK</title>
    
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="<?= base_url() ?>/template/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url() ?>/template/assets/images/logo/favicon.png" type="image/png">
    
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/shared/iconly.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css">

    <!-- datatable -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/pages/datatables.css">

    <!-- sweeralert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/extensions/sweetalert2/sweetalert2.min.css">

    <!-- chart js -->
    <script src="<?= base_url() ?>/template/assets/chartjs/Chart.bundle.min.js"></script>

</head>

<body >
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="<?= site_url('/'); ?>" class="d-flex align-items-center">
                                <span class="fa-fw select-all fas me-3 " style="transform: rotate(-25deg);"></span>
                                <span style="font-size: 1.5rem;" class="">SPK</span>
                            </a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path><g transform="translate(-210 -1)"><path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path><circle cx="220.5" cy="11.5" r="4"></circle><path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path></g></g></svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" >
                                <label class="form-check-label" ></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path></svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <?= $this->include('layout/menu') ?>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
            <div class="page-heading d-flex align-items-center justify-content-between">
                <?= $this->renderSection('title') ?>
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-md2">
                        <?php if (session('login_info')): ?>
                        <img src="<?= base_url() ?>/template/assets/images/faces/1.jpg" alt="Face 1">
                        <?php endif ?>
                    </div>
                    <div class="ms-3 name">
                        <?php if (session('login_info')): ?>
                        <h5 class="font-bold "><?= user_login()->nama_user ?></h5>
                        <h6 class="text-muted mb-0"><?= user_login()->username ?></h6>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <?= $this->renderSection('content') ?>
            </div>

            <!-- <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p><//?= date('Y') ?> &copy; </p>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>

    <script src="<?= base_url() ?>/template/assets/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/app.js"></script>

    <!-- chart js -->
    <script src="<?= base_url() ?>/template/assets/extensions/chart.js/Chart.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/pages/ui-chartjs.js"></script>

    <!-- datatable -->
    <script src="<?= base_url() ?>/template/assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/pages/datatables.js"></script>

    <!-- sweetalert2 -->
    <script src="<?= base_url() ?>/template/assets/extensions/sweetalert2/sweetalert2.min.js"></script>

    <!-- my script -->
    <script type="text/javascript" src="<?= base_url() ?>/template/assets/js/script.js"></script>
    
    <!-- data KPM -->
    <?php if ($page == "dashboard" || $page == "hasil"): ?>
        <script>
            var alternatif = []
            var hasil      = []
        </script>
        <?php foreach ($hasil as $dt_hasil): ?>
            <script>
                alternatif.push("<?= $dt_hasil->nama_penduduk; ?>")
                hasil.push("<?= $dt_hasil->hasil; ?>")
            </script>
        <?php endforeach ?>
    <?php endif ?>
    
    <script src="<?= base_url() ?>/template/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/pages/dashboard.js"></script>

    <script>

        $(document).ready(function(){
            $('#tabel2').DataTable();
        });

        const ctx = document.getElementById('bar');
        new Chart(ctx, {
            type: 'bar',
            data: {
              labels: alternatif,
              datasets: [{
                label: '# Total Nilai',
                data: hasil,
                 borderColor: '#36A2EB',
              backgroundColor: '#9BD0F5',
                borderWidth: 1
              }]
            },
            options: {
              scales: {
               yAxes: [
                    {
                      ticks: {
                        beginAtZero: true,
                        suggestedMax: 0 + 1,
                        padding: 10,
                    },
                      gridLines: {
                        drawBorder: false,
                      },
                    },
                  ],
              }
            }
          });

    </script>

    <?php if (session()->getFlashData('err_periode')): ?>

    <script>
        Swal.fire({
          icon: 'warning',
          title: 'Gagal',
          text: "<?= session()->getFlashData('err_periode') ?>",
        })
    </script>
    
    <?php endif ?>

</body>

</html>
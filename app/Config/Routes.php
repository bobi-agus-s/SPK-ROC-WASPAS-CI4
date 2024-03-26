<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup 
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// create db
$routes->get('create-db', function()
{
    $forge = \Config\Database::forge();
    if ($forge->createDatabase('db_spk_bansos')) {
        echo 'Database created!';
    }
});

$routes->get('/', 'Home::index');
$routes->get('getDusun', 'DusunController::getDusun');
$routes->get('banjarejo', 'Home::banjarejo');
$routes->get('mekarsari', 'Home::mekarsari');
$routes->get('krajan', 'Home::krajan');
$routes->get('mulyosari', 'Home::mulyosari');
$routes->get('margodadi', 'Home::margodadi');
$routes->get('mekarindah', 'Home::mekarindah');
$routes->get('wadah', 'Home::wadah');
$routes->get('totalDusun/(:num)', 'DusunController::totalDusun/$1');

// ---------------- login ----------------

$routes->group('auth', function ($routes) {
    $routes->add('login', 'auth\LoginController::index');
    $routes->add('validate', 'auth\LoginController::validasi_login');
    $routes->add('logout', 'auth\LoginController::logout');
});

// ---------------------------------------

// ----------------------- MASTER DATA ----------------------

// Penduduk
$routes->group('penduduk', function($routes)
{
    $routes->get('pengajuan/(:num)/(:num)', 'PendudukController::pengajuan/$1/$2');
    $routes->get('truncate', 'PendudukController::truncate');
    $routes->get('export', 'PendudukController::exportExcel');
    $routes->get('export/(:any)', 'PendudukController::exportExcel/$1');
    $routes->get('delete/(:num)', 'PendudukController::delete/$1');
    $routes->post('filter', 'PendudukController::filter');
});
$routes->presenter('penduduk', ['controller'  => 'PendudukController']);

// agama
$routes->group('agama', function($routes)
{
    $routes->get('truncate', 'AgamaController::truncate');
    $routes->get('delete/(:num)', 'AgamaController::delete/$1');
});
$routes->presenter('agama', ['controller'  => 'AgamaController']);

// Dusun
$routes->group('dusun', function($routes)
{
    $routes->get('truncate', 'DusunController::truncate');
    $routes->get('delete/(:num)', 'DusunController::delete/$1');
});
$routes->presenter('dusun', ['controller'  => 'DusunController']);

// ----------------------- SPK ------------------------

// Periode
$routes->group('periode', function($routes)
{
    $routes->get('delete/(:num)', 'PeriodeController::delete/$1');
});
$routes->presenter('periode', ['controller'  => 'PeriodeController']);

// kriteria
$routes->group('kriteria', function($routes)
{
    $routes->get('periode', 'KriteriaController::periode');
    $routes->get('print', 'KriteriaController::print');
    $routes->get('cetak', 'KriteriaController::cetak');
    $routes->get('delete/(:num)/(:num)', 'KriteriaController::delete/$1/$2');
    $routes->get('truncate', 'KriteriaController::truncate');
    $routes->get('generate/(:num)', 'KriteriaController::generateBobot/$1');
});
$routes->presenter('kriteria', ['controller' => 'KriteriaController']);

// sub kriteria
$routes->get('subkriteria/delete/(:num)', 'SubKriteriaController::delete/$1');
$routes->presenter('subkriteria', ['controller' => 'SubKriteriaController']);

// alternatif
$routes->group('alternatif', function($routes)
{
    // $routes->get('delete/(:num)', 'AlternatifController::delete/$1');
    $routes->get('delete/(:num)/(:num)/(:num)', 'AlternatifController::delete/$1/$2/$3');
    $routes->get('truncate', 'AlternatifController::truncate');
    $routes->post('ajukan', 'AlternatifController::pengajuan');
});
$routes->presenter('alternatif', ['controller'  => 'AlternatifController']);

// penilaian
$routes->group('penilaian', function($routes)
{
    $routes->get('(:num)', 'PenilaianController::input/$1');
    $routes->get('edit/(:num)', 'PenilaianController::edit/$1');
    $routes->get('show/(:num)', 'PenilaianController::show/$1');
    $routes->post('save', 'PenilaianController::save');
    $routes->post('update', 'PenilaianController::update');
});

// perhitungan
$routes->get('perhitungan', 'PerhitunganController::index');

// hasil
$routes->get('hasil', 'PerhitunganController::hasil');


// ---- user ----
$routes->group('user', function($routes)
{
    $routes->get('profil', 'konfigurasi\UserController::profil');
    $routes->get('profil/update/(:num)', 'konfigurasi\UserController::profilUpdate/$1');

    $routes->get('truncate', 'konfigurasi\UserController::truncate');
    $routes->get('delete/(:num)', 'konfigurasi\UserController::delete/$1');
});
$routes->presenter('user', ['controller'  => 'konfigurasi\UserController']); 

// ---- akses ----
$routes->group('akses', function($routes)
{
    $routes->get('/', 'konfigurasi\AksesController::index');
    $routes->post('simpan', 'konfigurasi\AksesController::simpan');
});

// ---------------------- konfigurasi
$routes->group('konfigurasi', function($routes)
{
    $routes->get('set_periode', 'konfigurasi\SettingPeriodeController::index');
    $routes->post('periode', 'konfigurasi\SettingPeriodeController::setPeriode');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
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
$routes->get('home', 'Home::index');

$routes->group('karyawan', static function ($routes) {
    $routes->get('', 'Admin\Karyawan::index');
    $routes->get('detail/(:segment)', 'Admin\Karyawan::detail/$1');
    $routes->get('tambah', 'Admin\Karyawan::tambah');
    $routes->post('tambah', 'Admin\Karyawan::tambah');
    $routes->get('hapus/(:segment)', 'Admin\Karyawan::hapus/$1');
});

$routes->group('absen', static function ($routes) {
    $routes->get('', 'Admin\AbsenController::index');
    $routes->get('absen_admin/(:any)/(:any)/(:any)', 'Admin\AbsenController::add/$1/$2/$3');
    $routes->get('karyawan', 'Karyawan\AbsenController::index');
    $routes->get('karyawan/absen_karyawan/(:any)/(:any)/(:any)', 'Karyawan\AbsenController::add/$1/$2/$3/$4');
    $routes->get('karyawan/absen_karyawann/(:any)/(:any)/(:any)', 'Karyawan\AbsenController::addd/$1/$2/$3');
});



$routes->group('kinerja', static function ($routes) {
    $routes->get('', 'Admin\Kinerja::index');
    
});

$routes->group('hari', static function ($routes) {
    $routes->get('', 'Admin\HariKerjaController::index');
    $routes->get('open', 'Admin\HariKerjaController::open');
    
});



$routes->get('login/login', 'Login::login');
$routes->get('login/logout', 'Login::logout');


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

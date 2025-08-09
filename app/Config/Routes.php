<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//VA OWNER START
$routes->get('identitasanak', 'IdentitasanakController::index');
$routes->get('identitasanak/create', 'IdentitasanakController::create');
$routes->post('identitasanak/store', 'IdentitasanakController::store');
$routes->get('identitasanak/edit/(:num)', 'IdentitasanakController::edit/$1');
$routes->post('identitasanak/update/(:num)', 'IdentitasanakController::update/$1');
$routes->get('identitasanak/delete/(:num)', 'IdentitasanakController::delete/$1');

$routes->post('identitasanak/data', 'IdentitasanakController::data');
$routes->get('identitasanak/print/(:num)', 'IdentitasanakController::print/$1');

//transaksi START
$routes->get('transaksi', 'Transaksi::index');
$routes->get('transaksi/create', 'Transaksi::create');
$routes->post('transaksi/store', 'Transaksi::store');
$routes->get('transaksi/edit/(:num)', 'Transaksi::edit/$1');

$routes->get('transaksi/mark/(:num)', 'Transaksi::mark/$1');
$routes->get('transaksi/unmark/(:num)', 'Transaksi::unmark/$1');

$routes->get('transaksi/invoice/(:num)', 'Transaksi::invoice/$1');

$routes->get('transaksi/detail/(:num)', 'Transaksi::detail/$1');
$routes->post('transaksi/update/(:num)', 'Transaksi::update/$1');
$routes->get('transaksi/delete/(:num)', 'Transaksi::delete/$1');

$routes->post('transaksi/data', 'Transaksi::data');

$routes->get('transaksi/front', 'Transaksi::front');
$routes->get('transaksi/print', 'Transaksi::print');

$routes->get('transaksi/send/(:any)', 'Transaksi::send_konfirmasi/$1');
$routes->get('transaksi/invoice/(:segment)', 'Transaksi::invoice/$1');

$routes->get('whatsapp','whatsapp::send');



//Tagihan Start
$routes->get('tagihan/(:any)', 'Potensi::tagihan/$1');
$routes->post('potensi/datatagihan/(:any)', 'Potensi::datatagihan/$1');
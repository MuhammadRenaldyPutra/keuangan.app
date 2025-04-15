<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
| Lihat dokumentasi resmi di:
| https://codeigniter.com/userguide3/general/routing.html
| -------------------------------------------------------------------------
*/

/*
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
*/

// Default controller jika URL kosong (langsung ke login)
$route['default_controller'] = 'auth/login';

// Halaman error
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| CUSTOM ROUTES
| -------------------------------------------------------------------------
*/

// Login & Auth
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['auth/doLogin'] = 'auth/doLogin';

// Transaksi
$route['transaksi'] = 'transaksi/index';
$route['transaksi/create'] = 'transaksi/create';
$route['transaksi/store'] = 'transaksi/store';
$route['transaksi/edit/(:num)'] = 'transaksi/edit/$1';
$route['transaksi/update/(:num)'] = 'transaksi/update/$1';
$route['transaksi/delete/(:num)'] = 'transaksi/delete/$1';

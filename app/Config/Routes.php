<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login','Auth::login');
$routes->post('/authenticate','Auth::authenticate');

$routes->get('/admin/dashboard','Admin::dashboard');
$routes->post('/admin/upload','Admin::upload');
$routes->get('/admin/toggle/(:num)','Admin::toggle/$1');
$routes->get('/admin/download/(:num)','Admin::download/$1');

$routes->get('/survey/(:any)','Survey::show/$1');
$routes->post('/survey/submit','Survey::submit');

$routes->get('/admin/export/(:num)', 'Admin::exportResults/$1');
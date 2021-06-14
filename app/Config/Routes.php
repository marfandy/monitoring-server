<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('User');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
$routes->get('/login', 'Auth::index');
$routes->get('/user', 'Auth::user');
$routes->get('/user/create', 'Auth::create');
$routes->post('/user/update/(:num)', 'Auth::update/$1');
$routes->get('/user/update/(:any)', 'Auth::notfound');
$routes->get('/user/edit/(:num)', 'Auth::edit/$1');
$routes->delete('/user/(:num)', 'Auth::delete/$1');
$routes->get('/host/create', 'Host::create');
$routes->delete('/host/(:num)', 'Host::delete/$1');
$routes->get('/host/edit/(:segment)', 'Host::edit/$1');
$routes->get('/host/(:any)', 'Host::edit/$1');
// $routes->get('/log', 'Log::logUser');



/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

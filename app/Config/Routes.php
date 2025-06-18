<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Rutas estaticas
$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');
$routes->get('/contact', 'Pages::contact');
$routes->get('/comercialization', 'Pages::comercialization');
$routes->get('/terms-uses', 'Pages::terms_uses');
$routes->get('/maintenance', 'Pages::maintenance');

//Rutas para logearse
$routes->get('/Auth/Login', 'UsuarioController::login');
$routes->post('/Auth/doLogin', 'UsuarioController::doLogin');
$routes->get( '/Auth/Register', 'UsuarioController::register');
$routes->post('/Auth/doRegister', 'UsuarioController::doRegister');
$routes->post('/logout', 'UsuarioController::logout');

// admin
$routes->get('/Admin/adminPage', 'AdminController::adminPage');
$routes->get('/Admin/manageStock', 'AdminController::manageStock');
$routes->get('/Admin/manageUsers', 'AdminController::manageUsers');
//stock
$routes->get('/Admin/addStock', 'AdminController::addStock');
$routes->post('/Admin/addStock', 'AdminController::saveStock');

//productos
$routes->get('/producto/(:num)', 'ProductosController::show/$1');






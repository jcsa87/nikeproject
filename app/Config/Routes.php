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
$routes->get('/Auth/login', 'UsuarioController::login');
$routes->post('/Auth/login', 'UsuarioController::doLogin');
$routes->get( '/Auth/register', 'UsuarioController::register');
$routes->post('/Auth/register', 'UsuarioController::doRegister');





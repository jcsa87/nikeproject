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
$routes->get('/consulta', 'Pages::consulta');



//Rutas para logearse
$routes->get('/Auth/Login', 'UsuarioController::login');
$routes->post('/Auth/doLogin', 'UsuarioController::doLogin');
$routes->get( '/Auth/Register', 'UsuarioController::register');
$routes->post('/Auth/doRegister', 'UsuarioController::doRegister');
$routes->post('/logout', 'UsuarioController::logout');

//                                         apartado admin
$routes->get('/Admin/adminPage', 'AdminController::adminPage');
$routes->get('/Admin/manageStock', 'AdminController::manageStock');
$routes->get('/Admin/manageUsers', 'AdminController::manageUsers');
$routes->get('/home_usuario', 'Pages::homeUsuario');

//stock
$routes->get('/Admin/addStock', 'AdminController::addStock');
$routes->post('/Admin/addStock', 'AdminController::saveStock');
$routes->post('/Admin/deleteProduct/(:num)', 'AdminController::deleteProduct/$1');
$routes->post('/Admin/activateProduct/(:num)', 'AdminController::activateProduct/$1');

$routes->get('/Admin/editStock/(:num)', 'AdminController::editar_producto/$1');
$routes->post('/Admin/actualizar', 'AdminController::actualizar_producto');

$routes->get('/Admin/consultarVentas', 'AdminController::consultarVentas');

//categoría
$routes->get('/Admin/addCategory', 'AdminController::addCategory');
$routes->post('/Admin/addCategory', 'AdminController::saveCategory');

//productos
$routes->get('/producto/(:num)', 'ProductosController::show/$1');

//factura
$routes->get('factura/ver/(:num)', 'FacturaController::ver/$1');

//catalogo
$routes->get('producto/catalogo', 'ProductosController::catalogo');

//Rutas del carrito
$routes->get('carrito/checkout', 'CarritoController::checkout');
$routes->get('carrito', 'CarritoController::index');
$routes->get('carrito/agregar/(:num)', 'CarritoController::agregar/$1');
$routes->get('carrito/eliminar/(:num)', 'CarritoController::eliminar/$1');
$routes->get('carrito/vaciar', 'CarritoController::vaciar');





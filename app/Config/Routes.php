<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rutas estáticas
$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');
$routes->get('/contact', 'Pages::contact');
$routes->get('/comercialization', 'Pages::comercialization');
$routes->get('/terms-uses', 'Pages::terms_uses');
$routes->get('/maintenance', 'Pages::maintenance');
$routes->get('/consulta', 'Pages::consulta');

$routes->get('/perfil', 'UsuarioController::perfil');

// Rutas para logearse
$routes->get('/Auth/Login', 'UsuarioController::login');
$routes->post('/Auth/doLogin', 'UsuarioController::doLogin');
$routes->get('/Auth/Register', 'UsuarioController::register');
$routes->post('/Auth/doRegister', 'UsuarioController::doRegister');
$routes->post('/logout', 'UsuarioController::logout');

// Apartado admin
$routes->get('/Admin/adminPage', 'AdminController::adminPage');
$routes->get('/Admin/manageStock', 'AdminController::manageStock');

$routes->get('/home_usuario', 'Pages::homeUsuario');

// Stock
$routes->get('/Admin/addStock', 'AdminController::addStock');
$routes->post('/Admin/addStock', 'AdminController::saveStock');
$routes->post('/Admin/deleteProduct/(:num)', 'AdminController::deleteProduct/$1');
$routes->post('/Admin/activateProduct/(:num)', 'AdminController::activateProduct/$1');

$routes->get('/Admin/editStock/(:num)', 'AdminController::editar_producto/$1');
$routes->post('/Admin/actualizar', 'AdminController::actualizar_producto');

$routes->get('/Admin/consultarVentas', 'AdminController::consultarVentas');

// Categoría
$routes->get('/Admin/addCategory', 'AdminController::addCategory');
$routes->post('/Admin/addCategory', 'AdminController::saveCategory');

// User
$routes->get('/Admin/manageUsers', 'AdminController::manageUsers');
$routes->get('/Admin/addUser', 'AdminController::addUser');
$routes->post('/Admin/addUser', 'AdminController::addUser');
$routes->get('/Admin/editUser/(:num)', 'AdminController::editUser/$1');
$routes->post('/Admin/editUser/(:num)', 'AdminController::updateUser/$1');
$routes->post('/Admin/deactivateUser/(:num)', 'AdminController::deactivateUser/$1');
$routes->post('/Admin/activateUser/(:num)', 'AdminController::activateUser/$1');

// Productos
$routes->get('/producto/(:num)', 'ProductosController::show/$1');

// Factura
$routes->get('factura/ver/(:num)', 'FacturaController::ver/$1');

// Catálogo
$routes->get('producto/catalogo', 'ProductosController::catalogo');

// Rutas del carrito
$routes->get('carrito/checkout', 'CarritoController::checkout');
$routes->get('carrito', 'CarritoController::index');
$routes->get('carrito/agregar/(:num)', 'CarritoController::agregar/$1');
$routes->get('carrito/eliminar/(:num)', 'CarritoController::eliminarProducto/$1');
$routes->get('carrito/vaciar', 'CarritoController::vaciar');

// Nuevas rutas POST para el carrito
$routes->post('carrito/aumentar/(:num)', 'CarritoController::aumentar/$1');
$routes->post('carrito/disminuir/(:num)', 'CarritoController::disminuir/$1');
$routes->post('carrito/eliminar_uno/(:num)', 'CarritoController::eliminarUno/$1');
$routes->post('carrito/eliminar/(:num)', 'CarritoController::eliminar/$1');
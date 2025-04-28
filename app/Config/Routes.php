<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');
$routes->get('/comercialization', 'Home::comercialization');
$routes->get('/terms-uses', 'Home::terms_uses');
$routes->get('/maintenance', 'Home::maintenance');


// Redirigir a la página de mantenimiento
return redirect()->to('/maintenance');


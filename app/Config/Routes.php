<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('nosotros', 'Pages::nosotros');
$routes->get('cursos', 'Cursos::index');
$routes->get('cursos/(:num)', 'Cursos::detalle/$1');
$routes->get('contacto', 'Pages::contacto');
$routes->post('contacto/enviar', 'Pages::enviarContacto');

// Admin Routes
$routes->group('admin', function($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('crear', 'Admin::crear');
    $routes->post('guardar', 'Admin::guardar');
    $routes->get('editar/(:num)', 'Admin::editar/$1');
    $routes->post('actualizar/(:num)', 'Admin::actualizar/$1');
    $routes->get('eliminar/(:num)', 'Admin::eliminar/$1');
    $routes->get('toggle-activo/(:num)', 'Admin::toggleActivo/$1');
    $routes->get('toggle-destacado/(:num)', 'Admin::toggleDestacado/$1');
});

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');

// API Routes
$routes->group('api', function($routes) {
    $routes->post('cursos', 'Api\Cursos::store');
    $routes->get('cursos', 'Api\Cursos::index');
    $routes->post('videos', 'Api\Videos::upload');
});
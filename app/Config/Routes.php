<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cursos', 'Home::cursos');
$routes->get('/nosotros', 'Home::nosotros');
$routes->get('/contacto', 'Home::contacto');

// Admin Routes
$routes->group('admin', function($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('cursos', 'Admin\Cursos::index');
    $routes->post('cursos/store', 'Admin\Cursos::store');
    $routes->get('videos', 'Admin\Videos::index');
    $routes->post('videos/upload', 'Admin\Videos::upload');
});

// API Routes
$routes->group('api', function($routes) {
    $routes->post('cursos', 'Api\Cursos::store');
    $routes->get('cursos', 'Api\Cursos::index');
    $routes->post('videos', 'Api\Videos::upload');
});

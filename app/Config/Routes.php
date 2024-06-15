<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->post('/login/authenticate', 'Login::authenticate');
$routes->post('/logout', 'Login::logout');
$routes->get('/dashboard', 'Home::index');
$routes->get('/users', 'UserController::index');
$routes->get('/users/create', 'UserController::create');
$routes->post('/users/store', 'UserController::store');
$routes->get('/users/edit/(:segment)', 'UserController::edit/$1');
$routes->post('/users/update/(:segment)', 'UserController::update/$1');
$routes->get('/users/delete/(:segment)', 'UserController::delete/$1');

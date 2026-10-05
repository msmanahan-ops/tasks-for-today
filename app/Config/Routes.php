<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Pages::welcome');
$routes->get('tasks', 'Pages::tasks');
$routes->get('profile', 'Pages::profile');
$routes->get('about', 'Pages::about');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attempt');
$routes->post('logout', 'Auth::logout', ['filter' => 'taskAuth']);

$routes->get('tasks/new', 'Tasks::new', ['filter' => 'taskAuth']);
$routes->post('tasks', 'Tasks::create', ['filter' => 'taskAuth']);
$routes->get('tasks/(:num)/edit', 'Tasks::edit/$1', ['filter' => 'taskAuth']);
$routes->post('tasks/(:num)', 'Tasks::update/$1', ['filter' => 'taskAuth']);
$routes->post('tasks/(:num)/archive', 'Tasks::archive/$1', ['filter' => 'taskAuth']);


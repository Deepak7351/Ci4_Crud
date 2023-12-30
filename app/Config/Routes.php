<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  get routes
$routes->get('login', 'Home::index');
$routes->get('/', 'Book::index');
$routes->get('index', 'Book::index');
$routes->get('create', 'Book::create');
$routes->get('edit/(:num)', 'Book::editBooks/$1');
$routes->get('delete/(:num)', 'Book::deleteBooks/$1');


// post Routes
$routes->post('create', 'Book::create');
$routes->post('edit/(:num)', 'Book::editBooks/$1');
// $routes->post('delete', 'Book::create');

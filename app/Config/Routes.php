<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/paymentAPI/(:any)/(:any)', 'PaymentAPI::index/$1/$2');
$routes->get('/ticketAPI/(:any)/(:any)', 'TicketAPI::index/$1/$2');
$routes->get('/login', 'LoginController::index');
$routes->get('/logout', 'LoginController::logout');
$routes->post('/login_action', 'LoginController::login_action');
$routes->get('/detail/(:segment)', 'Home::detail/$1');
$routes->post('/payment', 'PaymentController::index');
$routes->get('/purchases', 'PurchasesController::index');
$routes->get('/purchase/(:segment)', 'PurchasesController::detail/$1');


$routes->get('/ticket/create', 'TicketController::create');
$routes->post('/purchase', 'PaymentController::purchase');

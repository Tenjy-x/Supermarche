<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/caisse/selectionner' , 'Home::Achat');
$routes->get('/achat/index' , 'AchatController::Index');

<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'PdfController::index');
$routes->post('/count-pages', 'PdfController::countPages');

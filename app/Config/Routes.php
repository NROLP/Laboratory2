<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/main', 'MusicController::display');

$routes->get('/searchSong', 'MediaController::searchSong');



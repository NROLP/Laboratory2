<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/MainSongController', 'MainSongController::display');
$routes->get('/MainSongController', 'MainSongController::methodName');

$routes->get('/MainSongController/createPlaylist', 'MainSongController::createPlaylist');
$routes->post('/MainSongController/addSong', 'MainSongController::addSong');
$routes->post('/MainSongController/deleteSong', 'MainSongController::deleteSong');
$routes->post('/MainSongController/addToPlaylist', 'MainSongController::addToPlaylist');
$routes->get('/MainSongController/playlist/(:num)', 'MainSongController::playlist/$1');




<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('profil', 'Profil::index');
$routes->get('profile', 'Profil::index');
$routes->get('mahasiswa/form', 'Mahasiswa::form');
$routes->post('mahasiswa/simpan', 'Mahasiswa::simpan');

// Tugas BAB 2 - Routing dan Controller
$routes->get('praktikum/form', 'Praktikum::form');
$routes->post('praktikum/simpan', 'Praktikum::simpan');

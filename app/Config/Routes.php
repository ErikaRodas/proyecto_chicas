<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Rutas para el CRUD de Estudiantes (Meilyn)
$routes->get('estudiantes/crear', 'EstudiantesController::crear');
$routes->post('estudiantes/guardar', 'EstudiantesController::guardar');
$routes->get('estudiantes', 'EstudiantesController::index'); // Ruta temporal para la redirección
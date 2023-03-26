<?php
define('ROUTES', [
  '/' => [HomeController::class, 'index'],
  '/login' => [AuthController::class, 'login'],
  '/dashboard' => [DashboardController::class, 'index'],

  '/proker' => [ProkerController::class, 'index'],
  '/proker/create' => [ProkerController::class, 'create'],
  '/proker/store' => [ProkerController::class, 'store'],
  '/proker/{id}' => [ProkerController::class, 'show'],
  '/proker/{id}/edit' => [ProkerController::class, 'edit'],
  '/proker/{id}/update' => [ProkerController::class, 'update'],
  '/proker/{id}/destroy' => [ProkerController::class, 'destroy'],
]);

define('DEFAULT_CONTROLLER', _404Controller::class);
define('DEFAULT_METHOD', 'index');

<?php
define('ROUTES', [
  '/' => [HomeController::class, 'index'],
  '/login' => [AuthController::class, 'login'],
  '/dashboard' => [DashboardController::class, 'index'],
  '/proker' => [ProkerController::class, 'index'],
  '/proker/create' => [ProkerController::class, 'create'],
]);

define('DEFAULT_CONTROLLER', _404Controller::class);
define('DEFAULT_METHOD', 'index');

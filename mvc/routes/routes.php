<?php

use Controllers\_404Controller;
use Controllers\AuthController;
use Controllers\BeritaController;
use Controllers\DashboardController;
use Controllers\EventController;
use Controllers\GaleriController;
use Controllers\HomeController;
use Controllers\PetawebController;
use Controllers\ProkerController;

define('ROUTES', [
  '/' => [HomeController::class, 'index'],
  '/login' => [AuthController::class, 'login'],
  '/authenticate' => [AuthController::class, 'authenticate'],
  '/dashboard' => [DashboardController::class, 'index'],
  '/petaweb' => [PetawebController::class, 'index'],

  '/proker' => [ProkerController::class, 'index'],
  '/proker/create' => [ProkerController::class, 'create'],
  '/proker/store' => [ProkerController::class, 'store'],
  '/proker/{id}' => [ProkerController::class, 'show'],
  '/proker/{id}/edit' => [ProkerController::class, 'edit'],
  '/proker/{id}/update' => [ProkerController::class, 'update'],
  '/proker/{id}/destroy' => [ProkerController::class, 'destroy'],

  '/event' => [EventController::class, 'index'],
  '/event/create' => [EventController::class, 'create'],
  '/event/store' => [EventController::class, 'store'],
  '/event/{id}' => [EventController::class, 'show'],
  '/event/{id}/edit' => [EventController::class, 'edit'],
  '/event/{id}/update' => [EventController::class, 'update'],
  '/event/{id}/destroy' => [EventController::class, 'destroy'],

  '/galeri' => [GaleriController::class, 'index'],
  '/galeri/create' => [GaleriController::class, 'create'],
  '/galeri/store' => [GaleriController::class, 'store'],
  '/galeri/{id}' => [GaleriController::class, 'show'],
  '/galeri/{id}/edit' => [GaleriController::class, 'edit'],
  '/galeri/{id}/update' => [GaleriController::class, 'update'],
  '/galeri/{id}/destroy' => [GaleriController::class, 'destroy'],

  '/berita' => [BeritaController::class, 'index'],
  '/berita/create' => [BeritaController::class, 'create'],
  '/berita/store' => [BeritaController::class, 'store'],
  '/berita/{id}' => [BeritaController::class, 'show'],
  '/berita/{id}/edit' => [BeritaController::class, 'edit'],
  '/berita/{id}/update' => [BeritaController::class, 'update'],
  '/berita/{id}/destroy' => [BeritaController::class, 'destroy'],
]);

define('DEFAULT_CONTROLLER', _404Controller::class);
define('DEFAULT_METHOD', 'index');
